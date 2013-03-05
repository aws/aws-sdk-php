import os, re, subprocess, json, collections
from sphinx.addnodes import toctree
from docutils import io, nodes, statemachine, utils
from docutils.parsers.rst import Directive
from jinja2 import Environment, PackageLoader

def setup(app):
    """
    see: http://sphinx.pocoo.org/ext/appapi.html
    this is the primary extension point for Sphinx
    """
    from sphinx.application import Sphinx
    if not isinstance(app, Sphinx): return

    app.add_role('regions', regions_role)
    app.add_directive('service', ServiceIntro)


def regions_role(name, rawtext, text, lineno, inliner, options={}, content={}):
    """Inserts a list of regions available to a service name

    Returns 2 part tuple containing list of nodes to insert into the
    document and a list of system messages.  Both are allowed to be
    empty.

    :param name: The role name used in the document.
    :param rawtext: The entire markup snippet, with role.
    :param text: The text marked with the role.
    :param lineno: The line number where rawtext appears in the input.
    :param inliner: The inliner instance that called us.
    :param options: Directive options for customization.
    :param content: The directive content for customization.
    """
    try:
        service_name = str(text)
        if not service_name:
            raise ValueError
        app = inliner.document.settings.env.app
        node = make_regions_node(rawtext, app, str(service_name), options)
        return [node], []
    except ValueError:
        msg = inliner.reporter.error(
            'The service name "%s" is invalid; ' % text, line=lineno)
        prb = inliner.problematic(rawtext, rawtext, msg)
        return [prb], [msg]


def get_regions(service_name):
    """Get the regions for a service by name

    Returns a list of regions

    :param service_name: Retrieve regions for this service by name
    """
    return ServiceDescription(service_name)['regions'].keys()


def make_regions_node(rawtext, app, service_name, options):
    """Create a list of regions for a service name

    :param rawtext:      Text being replaced with the list node.
    :param app:          Sphinx application context
    :param service_name: Service name
    :param options:      Options dictionary passed to role func.
    """
    regions = get_regions(service_name)
    return nodes.Text(", ".join(regions))


class Flyweight(object):
    """
    Allows cached instances of a class to be returned with new classes
    """

    def __init__(self, cls):
        self._cls = cls
        self._instances = dict()

    def __call__(self, *args, **kargs):
        return self._instances.setdefault(
            (args, tuple(kargs.items())),
            self._cls(*args, **kargs))


@Flyweight
class ServiceDescription():
    """
    Loads the service description for a given source file
    """

    def __init__(self, service):
        self.service_name = service
        self.description = self.load_description(self.determine_filename())

    def determine_filename(self):
        """Determines the filename to load for a service"""
        # Determine the path to the aws-config
        path = os.path.abspath("../src/Aws/Common/Resources/aws-config.php")
        self.config = self.__load_php(path)

        # Iterate over the loaded dictionary and see if a matching service exists
        for key in self.config["services"]:
            alias = self.config["services"][key].get("alias", "")
            if key == self.service_name or alias == self.service_name:
                break
        else:
            raise ValueError("No service matches %s" % (self.service_name))

        # Determine the name of the client class to load
        class_path = self.config["services"][key]["class"].replace("\\", "/")
        client_path = os.path.abspath("../src/" + class_path + ".php")

        # Determine the name of the servce description used by the client
        contents = open(client_path, 'r').read()
        matches = re.search("__DIR__ \. '/Resources/(.+)\.php'", contents)
        description = matches.groups(0)[0]

        # Strip the filename of the client and determine the description path
        service_path = "/".join(client_path.split("/")[0:-1])
        service_path += "/Resources/" + description + ".php"

        return service_path

    def load_description(self, path):
        """Determines the filename to load for a service

        :param path: Path to a service description to load
        """
        return self.__load_php(path)

    def __load_php(self, path):
        """Load a PHP script that returns an array using JSON

        :param path: Path to the script to load
        """
        path = os.path.abspath(path)
        sh = 'php -r \'$c = include "' + path + '"; echo json_encode($c);\''
        loaded = subprocess.check_output(sh, shell=True)
        return json.loads(loaded)

    def __getitem__(self, i):
        """Allows access to the service description items via the class"""
        return self.description.get(i)


class ServiceIntro(Directive):
    """
    Creates a service introduction to inject into a document
    """

    required_arguments = 1
    optional_arguments = 0
    final_argument_whitespace = True

    def run(self):
        service_name = self.arguments[0].strip()
        d = ServiceDescription(service_name)
        rawtext = self.generate_rst(d)
        tab_width = 4
        include_lines = statemachine.string2lines(
            rawtext, tab_width, convert_whitespace=1)
        self.state_machine.insert_input(
            include_lines, os.path.abspath(__file__))
        return []

    def get_doc_link(self, name, namespace):
        """Determine the documentation link for an endpoint"""
        if name == "sts":
            return "http://aws.amazon.com/documentation/iam/"
        else:
            return "http://aws.amazon.com/documentation/" + namespace.lower()

    def get_locator_name(self, name):
        """Determine the service locator name for an endpoint"""
        return name

    def generate_rst(self, d):
        rawtext = ""
        scalar = {}
        # Sort the operations by key
        operations = collections.OrderedDict(sorted(d.description['operations'].items()))

        # Grab all of the simple strings from the description
        for key in d.description:
            if isinstance(d[key], str) or isinstance(d[key], unicode):
                scalar[key] = d[key]
                # Add substitutions for top-level data in a service description
                rawtext += ".. |%s| replace:: %s\n\n" % (key, scalar[key])

        # Add magic methods to each operation
        for key in operations:
            operations[key]['magicMethod'] = key[0].lower() + key[1:]

        # Set the ordered dict of operations on the description
        d.description['operations'] = operations

        # Determine the service locator name and doc URL
        locator_name = self.get_locator_name(d["namespace"])
        docs = self.get_doc_link(locator_name, d["namespace"])

        env = Environment(loader=PackageLoader('aws', 'templates'))
        template = env.get_template("client_intro")
        rawtext += template.render(
            scalar,
            description=d.description,
            regions=get_regions(d["namespace"]),
            locator_name=locator_name,
            doc_url=docs)

        return rawtext
