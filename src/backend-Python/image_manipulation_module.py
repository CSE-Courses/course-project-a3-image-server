import editPhoto

def getMetadata(imagename):
    # Stubed out
    return "9W 4N, 1400, 1/1/2005"

def themePhoto(imageName, weather):
    if (weather == "Cloudy"):
        editPhoto.filterBlur(imageName)
    elif (weather == "Sunny"):
        editPhoto.filterSharpen(imageName)
    elif(weather == "Rainy"):
        editPhoto.filterEmboss(imageName)
    elif (weather == "Windy"):
        editPhoto.filderDetail(imageName)
    else: # default
        pass # Nop
    return 'download.jpg' # This is the modified image name
