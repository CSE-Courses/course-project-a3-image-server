# Example shell usage: python sharpen_image.py imagename
import sys
import editPhoto

sys.exit(editPhoto.filterSharpen(sys.argv[1]))
