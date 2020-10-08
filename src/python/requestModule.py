def frontRequest(image, tags):
    metadata = getMetadata(image)
    weatherContext = getWeatherContext(metadata)
    databaseStore(image, metadata, weatherContext, tags)