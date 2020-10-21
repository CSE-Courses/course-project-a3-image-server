# Example shell usage: python create_request.py imagename taglist
import sys
import request_module

sys.exit(request_module.frontRequest(sys.argv[1], sys.argv[2]))
