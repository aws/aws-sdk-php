from docutils import nodes


API_DOCS = "http://docs.aws.amazon.com/aws-sdk-php/v3/api/Aws/%s/%sClient.html"


def setup(app):
    """
    see: http://sphinx.pocoo.org/ext/appapi.html
    """
    app.add_role('apiref', apiref_role)


def api_link(name):
    return API_DOCS % (name, name)


def apiref_role(name, rawtext, text, lineno, inliner, options={}, content=[]):
    """
    Link to a service's API documentation.
    """
    name, namespace = tuple(text.split(" | "))
    app = inliner.document.settings.env.app
    uri = api_link(namespace)
    node = nodes.reference(name, name, refuri=uri)
    return [node], []
