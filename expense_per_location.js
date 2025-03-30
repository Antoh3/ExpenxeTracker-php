function errorCallback(error) {
    console.log("Error getting geolocation:", error);
    alert("Unable to retrieve your location.");
}

function successCallback(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Replace with Esri's Reverse Geocoding API endpoint
    const apiKey = 'AAPKf2b138d4aa72425a9c758c2e6d629e80pmu0067uUYp8RdiMPZlXOVXDplGsZa0eB3XaG1ukPW3nBL5pwO5aTXVRvYcLozKu';  // Replace with your Esri API Key
    const geocodeUrl = `https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=json&location=${longitude},${latitude}&outSR=4326&token=${apiKey}`;

    // Make a request to Esri's geocoding service
    fetch(geocodeUrl)
        .then(response => response.json())
        .then(data => {
            if (data.address) {
                const location = data.address.Match_addr;  // Get the address from the response
                // console.log(location);  // Log the address
                promptUserForExpense(location);  // Prompt user with the location address
            } else {
                console.error("Geocoding error: No address found.");
                promptUserForExpense('Unknown location');  // Fallback to an unknown location
            }
        })
        .catch(error => {
            console.error("Error fetching geocoding data:", error);
            promptUserForExpense('Error retrieving location');  // Handle error
        });
}



if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
} else {
    console.log("Geolocation is not supported by this browser.");
}

function promptUserForExpense(location) {
    const cost = prompt(`You spent at ${location}. How much did you spend?`);
    const item = prompt(`What item does this expense fall under? (e.g., Food, Transportation, etc.)`);
    // console.log("In location",location);
    
    // Save expense data
    saveExpense(location, cost, item);
}

function saveExpense(loc, amt, category) {
    // const userId = getUserId()

    let costitem = amt;
    let location = loc;
    let item = category;
    let today = new Date().toISOString().split("1")[0];
    let dateexpense = encodeURIComponent(today)
    // let userId = 1;

    console.log(amount,location,category);
    
    fetch('add-expense.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            costitem,
            location,
            item,
            dateexpense,
            // userId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Expense added successfully');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));

    // console.log(`Saving expense: Location: ${location}, Amount: ${amount}, Category: ${category}`);
    
}

function getUserId(params) {
    return 1
}
