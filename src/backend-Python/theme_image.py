# Example shell usage: python theme_image.py imagename
import sys
import request_module

sys.exit(request_module.filterPhoto(sys.argv[1]))
