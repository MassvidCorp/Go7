# Go7
Small home assignment


Logic Explanation:


The way i see it, We are handeling a system as a directed acyclic graph, The root has a clear path to all other nodes while the other nodes are connected to their children and such. This is a directed tree so to speak.

The logic is built on that way. A Graph can be represented in two ways -> array of link lists (each array element is a link list where the list represents the children in this case), or a two dimensional array which is how i kind of used in here.

The system is an array of objects which are called SystemObj, a systemObj is an abstract class which can be either a file or a directory.(called it Dir since Directory is a build in class in php.). 

Both Dir and File inherite from SystemObj, while Dir has some specific functionality such as add or remove a child from its children array of ids.

Making this graph an array helps to simplify some code, for example, to find a node all i need is the id, and no recursion or anything required - since in php we can have this as an associative array -> the key is the id and the value is the whole object which makes the finding of a node (systemObj) very fast.

To test the assignment -> please use the Samples files. To test the API you can use postman. The Api will produce mostly errors since this isnt a session or anything hence the $system array will never actually be saved and every call will delete it, so you won't be able to insert directories and files in one call so easily.


Things i would have consulted with other team memberes before implimenting:

    1. root node -> Do we have to insert the root first? or can we insert it whenever we want? since we can draw a graph in a random way(hypothetically) meaning, we can draw some nodes and some connections and THEN the root?
    I went with the answer Yes - we do need to have the root first. This makes some sense cause in a system i can't just have a void and create it later, i need hiearchy.

    2. In AddDirectory im doing all the validations inside the function which is usually not a good practice(a function should do one thing) -> but since its only one function that has so many validations - we want to split it into another function that does only that? In this specific case because of time management and since its an assignment with no real big consequences -> i went with the validations inside the function.

Please Note:
    1. The file Globals can be removed and i can use the $system array as a global anywhere else, but while writing i was thinking that we might need more so i left it as it is.

    2. Im not using Global variables in general, this was just for this task alone, since we are not using a database here and i would not use $_SESSION for this since the system could get big (in potential) so i used a global variable just for simplicity. 

    3. Php's int size depends on the php version and on the system it runs. on my system since it 64Bits and most likely yours as well -> the int size is 64 and not 32  hence its a long int.