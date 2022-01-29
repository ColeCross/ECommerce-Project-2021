//setX function, saves a value to local storage
function setX(x){
    localStorage.setItem('key', x);
}

//getX function, gets the value from local storage (if any), then deletes entry in local storage
function getX(){
    if (localStorage.getItem('key')){
        var x = localStorage.getItem('key');
        localStorage.removeItem('key');
        return x;
    }
    else return 0;
}

//shopFilter function, uses local storage value (if any) to determine the correct filter to apply to the shop page
function shopFilter(){
    var x = getX(); //get localstorage value and then have it deleted
    if (x != 0){
        switch (x) {
            case "1": //1 = Processors
                document.getElementById("Processors").checked = true;
                filterSelection('Processor');
                break;
            case "2": //2 = Video Cards
                document.getElementById("VideoCards").checked = true;
                filterSelection('Video');
                break;
            case "3": //3 = Power Supplies
                document.getElementById("PowerSupplies").checked = true;
                filterSelection('Power');
                break;
            case "4": //4 = Storage
                document.getElementById("Storage").checked = true;
                filterSelection('Storage');
                break;
            case "5": //5 = Memory
                document.getElementById("Memory").checked = true;
                filterSelection('Memory');
                break;
            case "6": //6 = Cases
                document.getElementById("Cases").checked = true;
                filterSelection('Case');
                break;
            case "7": //7 = Motherboards
                document.getElementById("Motherboards").checked = true;
                filterSelection('Motherboard');
                break;
            case "8": //8 = Cooling
                document.getElementById("Cooling").checked = true;
                filterSelection('Cooling');
                break;
            case "9": //9 = Today's Best Deals
                document.getElementById("TodaysBest").checked = true;
                filterSelection('1');
                break;
            case "10": //10 = Best Sellers
                document.getElementById("BestSellers").checked = true;
                filterSelection('1');
                break;
            case "11": //11 = Currently on Sale
                document.getElementById("OnSale").checked = true;
                filterSelection('1');
                break;
            case "12": //12 = Special Offers
                document.getElementById("SpecialOffers").checked = true;
                filterSelection('1');
                break;
            case "13": //13 = Highest rated Products
                document.getElementById("HighestRated").checked = true;
                break;
            case "14": //14 = Newest Products
                document.getElementById("Newest").checked = true;
                break;
        }

        return 1;
    }

    else return;
}

//add to cart function
function addtoCart(id){
    $.ajax({ //call addtocart.php and pass the product id as a variable
        url: "addtocart.php",
        type: "POST",
        data: {
            addID: id
        }
    })

    $(".navbar").load("header.php .navbar"); //reload navbar to update cart item count
}

//remove from cart function
function removeFromCart(id){
    $.ajax({ //call removefromcart.php and pass the product id as a variable
        url: "removefromcart.php",
        type: "POST",
        data: {
            rID: id
        }
    })

    $(".navbar").load("header.php .navbar"); //reload navbar to update cart item count
    location.reload(); //reload cart page to update cart and cost
}

//function to pass the correct product id to the product page
function passProductID(id){
    window.location.href = "product.php?id=" + encodeURIComponent(id); //pass product id to the product page
}

//accLinKChange function, redirects the "Account" links from login.php to account.php if a user is logged in
function accLinkChange(){
    document.getElementById("acclink").setAttribute("href", "account.php"); //update navbar link
    document.getElementById("acclinkF").setAttribute("href", "account.php"); //update footer link
}

//function to check if passwords match or not
function checkpwds(form){
    if (form.Pass.value.length != 0 && form.ConPass.value.length != 0){ //check if both password fields have content

        pwd1 = form.Pass.value;
        pwd2 = form.ConPass.value;

        if (pwd1 != pwd2){ //return 1 if passwords do NOT match
            return 1;
        }

        else return 2; //return 2 if passwords match
    }

    else if ((form.Pass.value != "" && form.ConPass.value == "") || (form.Pass.value == "" && form.ConPass.value != "")){ //check if either field is empty, but not both at the same time
        
        return 1; //return 1 if one field is empty and the other is not
    }

    else return 0; //return 0 as default (fields are both empty)

}

//function to create or remove alert if passwords do not match, and handle the Register button
function pwdAlert(){
    var x = checkpwds(acctform); //call above function

    if (x != 0){ //check if default (fields are both empty)

        if (x == 1){ //if passwords do not match or one field is not filled
            document.getElementById("alertP").innerHTML = "Passwords Do Not Match."; //display alert
            document.getElementById("acctBtn").disabled = true; //disable Register button
        }

        else { //if passwords match
            document.getElementById("alertP").innerHTML = ""; //remove alert
            document.getElementById("acctBtn").disabled = false; //enable Register button
        }
    }

    else { //if both fields are empty
        document.getElementById("alertP").innerHTML = ""; //remove alert
        document.getElementById("acctBtn").disabled = true; //disable Register button
    }
}

//function to display only the chosen admin tool on admin.php
function adminTools(id){
    document.getElementById("cAcc").style.display = "none";
    document.getElementById("dAcc").style.display = "none";
    document.getElementById("cPro").style.display = "none";
    document.getElementById("dPro").style.display = "none";

    document.getElementById(id).style.display = "block";
}

//function to display only the chosen acct update tool on account.php
function accTools(id){
    document.getElementById("chngpwd").style.display = "none";
    document.getElementById("chngmail").style.display = "none";
    document.getElementById("accinfo").style.width = "48%";

    document.getElementById(id).style.display = "block";
}

//filter functions, found at https://www.w3schools.com/howto/howto_js_filter_elements.asp
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterdiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }
  
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
}
  
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
    }
    element.className = arr1.join(" ");
  }