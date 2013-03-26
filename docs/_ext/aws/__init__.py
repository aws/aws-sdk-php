import os, re, subprocess, json, collections
from sphinx.addnodes import toctree
from docutils import io, nodes, statemachine, utils
from docutils.parsers.rst import Directive
from jinja2 import Environment, PackageLoader

# Maintain a cache of previously loaded examples
example_cache = {}

# Maintain a cache of previously loaded service descriptions
description_cache = {}


def setup(app):
    """
    see: http://sphinx.pocoo.org/ext/appapi.html
    this is the primary extension point for Sphinx
    """
    from sphinx.application import Sphinx
    if not isinstance(app, Sphinx): return

    app.add_role('regions', regions_role)
    app.add_directive('service', ServiceIntro)
    app.add_directive('example', ExampleDirective)


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
    return load_service_description(service_name)['regions'].keys()


def make_regions_node(rawtext, app, service_name, options):
    """Create a list of regions for a service name

    :param rawtext:      Text being replaced with the list node.
    :param app:          Sphinx application context
    :param service_name: Service name
    :param options:      Options dictionary passed to role func.
    """
    regions = get_regions(service_name)
    return nodes.Text(", ".join(regions))


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


def load_service_description(name):
    if name not in description_cache:
        description_cache[name] = ServiceDescription(name)
    return description_cache[name]


class ServiceIntro(Directive):
    """
    Creates a service introduction to inject into a document
    """

    required_arguments = 1
    optional_arguments = 0
    final_argument_whitespace = True

    def run(self):
        service_name = self.arguments[0].strip()
        d = load_service_description(service_name)
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


class ExampleDirective(Directive):
    """
    Inserts a formatted PHPUnit example into the source
    """

    # Directive configuration
    required_arguments = 2
    optional_arguments = 0
    final_argument_whitespace = True

    def run(self):
        self.end_function = "    }\n"
        self.begin_tag = "        // @begin\n"
        self.end_tag = "        // @end\n"

        example_file = self.arguments[0].strip()
        example_name = self.arguments[1].strip()

        if not example_name:
            raise ValueError("Must specify both an example file and example name")

        contents = self.load_example(example_file, example_name)
        rawtext = self.generate_rst(contents)
        tab_width = 4
        include_lines = statemachine.string2lines(
            rawtext, tab_width, convert_whitespace=1)
        self.state_machine.insert_input(
            include_lines, os.path.abspath(__file__))
        return []

    def load_example(self, example_file, example_name):
        """Loads the contents of an example and strips out non-example parts"""
        key = example_file + '.' + example_name

        # Check if this example is cached already
        if key in example_cache:
            return example_cache[key]

        # Not cached, so index the example file functions
        path = os.path.abspath(__file__ + "/../../../../tests/Aws/Tests/" + example_file)

        f = open(path, 'r')
        in_example = False
        capturing = False
        buffer = ""

        # Scan each line of the file and create example hashes
        for line in f:
            if in_example:
                if line == self.end_function:
                    if in_example:
                        example_cache[in_example] = buffer
                    buffer = ""
                    in_example = False
                elif line == self.begin_tag:
                    # Look for the opening // @begin tag to begin capturing
                    buffer = ""
                    capturing = True
                elif line == self.end_tag:
                    # Look for the optional closing tag to stop capturing
                    capturing = False
                elif capturing:
                    buffer += line
            elif "public function test" in line:
                # Grab the function name from the line and keep track of the
                # name of the current example being captured
                current_name = re.search('function (.+)\s*\(', line).group(1)
                in_example = example_file + "." + current_name
        f.close()
        return example_cache[key]

    def generate_rst(self, contents):
        rawtext = ".. code-block:: php\n\n" + contents
        return rawtext
