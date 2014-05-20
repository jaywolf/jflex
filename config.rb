# Change this to :production when ready to deploy the CSS to the live server.
environment = :development
#environment = :production

# In production, we can turn off the FireSass-compatible debug_info.
#firesass = false

# In development, we can turn on the FireSass-compatible debug_info.
firesass = true


# Location of the theme's resources.
css_dir           = "css"
sass_dir          = "sass"
images_dir        = "images"
javascripts_dir   = "js"
extensions_dir    = "sass-extensions"

# Require any additional compass plugins installed on your system.
# Example: require 'zen-grids'


# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = (environment == :development) ? :expanded : :compressed

# To enable relative paths to assets via compass helper functions. Since Drupal
# themes can be installed in multiple locations, we don't need to worry about
# the absolute path to the theme from the server root.
relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
#line_comments = false


# Pass options to sass. For development, we turn on the FireSass-compatible
# debug_info if the firesass config variable above is true.
sass_options = (environment == :development && firesass == true) ? {:debug_info => true} : {}
