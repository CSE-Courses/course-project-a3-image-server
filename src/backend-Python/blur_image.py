# Example shell usage: python blur_image.py imagename
import sys
import editPhoto

sys.exit(editPhoto.filterBlur(sys.argv[1]))
