removeErrorMsg()        // Remove Error Message on click the input field


errorMsg()              // Animation in Error Message from errorHandler
    - error                 // Field to animate
    - val                   // Value of height Default is 24px


errorHandler()          // To handle Ajax Message Response
    - error                 // ErrorCode of the response
/*
    ** Login.php ErrorCodes **
    101     ==> "Please, Enter username"
    102     ==> "Please, Enter password"
    103     ==> "Username or password are incorrect"

    ** Add || Remove favourites **
    111     ==> "No URL With ID $ID Let Us Know"

    ** Add New Link **
    121     ==> "Couldn't Automatically Get Title"
    122     ==> "URL is Invalid"
    123     ==> "Please, Enter Title"
*/


/*
** - Show Alert Message V1.1
*/

/*
** - V1.1 Take Other Container as Parameters instead of only ".success"
*/
successMsg()            // Show Message In Success class
    - error                 // Container that contain Alert Message [Default is ".success"]


removeSuccessMsg()      // Remove Success Message


favourites()            // Control Favourites Ad or Remove [Called on Start or Search]


showResults()           // Show Search Results
    - results                  // An Ajax Search JSON Response


copy()                  // Copy Button Handler [Called on Start Search]


deleteFunc()            // Delete Button Handler [Called on Start Search]

