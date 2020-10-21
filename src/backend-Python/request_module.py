import image_manipulation_module
import context_retrieval_module

def frontRequest(image, tags):
    metadata = image_manipulation_module.getMetadata(image)
    weatherContext = context_retrieval_module.getWeatherContext(metadata)
    tags = metadata + ", " + weatherContext + ", " + tags
    return tags # These tags are to be stored in the database

def filterPhoto(image):
    metadata = image_manipulation_module.getMetadata(image)
    weatherContext = context_retrieval_module.getWeatherContext(metadata)
    newImage = image_manipulation_module.themePhoto(image, weatherContext)
    return newImage # This image is to be displayed to the user
