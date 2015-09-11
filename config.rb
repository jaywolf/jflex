# Require any additional compass plugins installed on your system.
require 'compass'

# Change this to :production when ready to deploy the CSS to the live server.
environment = :development
#environment = :production

# Location of the theme's resources.
css_dir           = "css"
sass_dir          = "sass"
images_dir        = "images"
javascripts_dir   = "js"
fonts_dir         = "fonts"
extensions_dir    = "sass-extensions"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = (environment == :development) ? :expanded : :compressed

# To enable relative paths to assets via compass helper functions. Since Drupal
# themes can be installed in multiple locations, we don't need to worry about
# the absolute path to the theme from the server root.
relative_assets = true

# Conditionally enable line comments when in development mode.
line_comments = (environment == :production) ? false : true

# Output debugging info in development mode.
sass_options = (environment == :production) ? {} : {:debug_info => true}

# Enabled source maps in development mode for debugging purposes.
sourcemap = (environment == :production) ? false : true
