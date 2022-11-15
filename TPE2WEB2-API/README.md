# Documentacion REST API Plataformas

## ShowPlataformas 
>-Endpoint "plataformas" utilizando el metodo GET nos devuelve la lista de plataformas con su informacion vinculada que fue previamente añadida
El request quedaria asi http://localhost/TPE2WEB2-API/api/plataformas y nos va a devolver la lista completa

## ShowPlataforma
>-Endpoint "plataformas/id" utilizando el metodo GET nos devuelve el id solicitado con su informacion determinada
Por ejemplo el request para devolver un id, quedaria asi http://localhost/TPE2WEB2-API/api/plataformas/1 , solo teniendo que añadir el numero del id que se desea obtener, en este caso el id 1

## DeletePlataforma
>-Endpoint "plataformas/id" utilizando el metodo DELETE eliminamos el id seleccionado
Por ejemplo el request para eliminar un id, quedaria asi http://localhost/TPE2WEB2-API/api/plataformas/10 , solo teniendo que añadir el numero del id que se desea borrar, en este caso el id 9

## AddPlataforma
>-Endpoint "plataformas" utilizando el metodo POST nos permite añadir rellenando todos los campos una nueva plataforma
por ejemplo el request para añadir un id, quedaria asi http://localhost/TPE2WEB2-API/api/plataformas , si bien  es igual que el request para devolver la lista, en este caso se debe utilizar el metodo POST, el cual nos permitira agregar el id