import sys, os, subprocess

# Don't require opening PHP tags in PHP examples
from sphinx.highlighting import lexers
from pygments.lexers.web import PhpLexer
lexers['php'] = PhpLexer(startinline=True, linenos=1)
lexers['php-annotations'] = PhpLexer(startinline=True, linenos=1)
primary_domain = 'php'

project = u'AWS SDK for PHP'
copyright = u'2015, Amazon Web Services'
master_doc = 'index'

# Add our custom extensions
sys.path.append(os.path.abspath('_ext/'))
extensions = ['aws']

templates_path = ['_templates']
source_suffix = '.rst'

# Parse the version from the latest git tag
git_verson = subprocess.check_output('git describe --abbrev=0 --tags', shell=True)
version = os.getenv('VERSION', git_verson.strip())
# The full version, including alpha/beta/rc tags.
release = version

# List of patterns, relative to source directory, that match files and
# directories to ignore when looking for source files.
exclude_patterns = ['_build']

# Add any paths that contain custom static files (such as style sheets) here,
# relative to this directory. They are copied after the builtin static files,
# so a file named "default.css" will overwrite the builtin "default.css".
html_static_path = ['_static']

# Custom sidebar templates, maps document names to template names.
html_sidebars = {
    '**': ['sidebarlogo.html', 'localtoc.html', 'searchbox.html', 'feedback.html']
}

# If true, links to the reST sources are added to the pages.
html_show_sourcelink = False

# -- HTML theme settings ------------------------------------------------

import guzzle_sphinx_theme
extensions.append("guzzle_sphinx_theme")
html_translator_class = 'guzzle_sphinx_theme.HTMLTranslator'
html_theme_path = guzzle_sphinx_theme.html_theme_path()
html_theme = 'guzzle_sphinx_theme'

# Guzzle theme options (see theme.conf for more information)
html_theme_options = {
    # hack to add tracking
    "google_analytics_account": os.getenv('TRACKING', False),
    "project_nav_name": "AWS SDK for PHP",
    "github_user": "aws",
    "github_repo": "aws-sdk-php",
    "base_url": "http://docs.aws.amazon.com/aws-sdk-php/guide/latest/"
}
