var a=prompt("enter name");
var b=prompt("enter password");

var database ={
    username: "ali",
    password:"123"

}

var newsFeed = [
    {
        friend:"usman",
        status:"im feeling lucky"

    },
    {
        friend:"rose",
        status:"im not feeling lucky"
    }
]

if(a===database.username)
{
    if(b===database.password)
    {
        console.log(newsFeed[0].friend);
        console.log(newsFeed[0].status);
        console.log(newsFeed[1].friend);
        console.log(newsFeed[1].status);
    }
}
else{
    console.log("username and password not correct");
}
