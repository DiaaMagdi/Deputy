// prototypy about user : //

function UserPrototype(proto) {
    this.proto = proto;

    this.clone = function () {
        var user = new User();

        user.username = proto.username;
        user.email = proto.email;
        user.password = proto.password;

        return user;
    };
}

function User(username, email, password) {

    this.username = username;
    this.email = email;
    this.password = password;

    this.say = function () {
        alert("Hi"+" "+ this.username +" "+ " , your email is: "+" " + this.email
        +" "+"and your password is: " +" "+ this.password);
    };
}

function createUser() {

    var signup_username = document.getElementById("signup-username");
    var signup_email = document.getElementById("signup-email");
    var signup_password = document.getElementById("signup-password");
    var proto = new User(signup_username.value, signup_email.value, signup_password.value);
    var prototype = new UserPrototype(proto);

    var user = prototype.clone();
    user.say();
}