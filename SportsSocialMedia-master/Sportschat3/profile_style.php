* {
box-sizing: border-box;
}
html, body {
height: 50%;
margin: 0;
font: 1em "Fira Sans", sans-serif;
background-color: #333;
}

/* Create two equal columns that floats next to each other */
.column {
float: left;
width: 50%;
height: 100vh; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}
.topbar {
background-color: black;
}
.topbar img{
width:30%;
height: 250px;
display: block;
margin-left: auto;
margin-right: 40%;
}
.topnav {
position: relative;
overflow: hidden;
background-color: black;
top:0;
}

.topnav a {
float: left;
color: #f2f2f2;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

.topnav a:hover {
background-color: #ddd;
color: black;
}

.topnav-center a {
float: none;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.topnav-right {
float: right;
}
#user_log{
background-color: black;
background-image: url('images/profileBackground.jpg');
background-repeat: no-repeat;
background-position: center;
background-size:100% 100%;
}
.user_content {
background: rgba(40, 101, 145, 0.49);
height: 100vh; /* Should be removed. Only for demonstration */
position:absolute;
width:50%;
}
.profile-logo{
text-align:center;
padding-top:25%;
}

#teams_players{
padding-left:10%;
padding-right:10%;
padding-top:5%;

}
.team h3{
box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.41);
padding: 10px;
background-color: darkblue;
color: white;
}

.team p, .player p{
padding:10px;
}
.player h3{
box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.41);
padding: 10px;
background-color: darkred;
color: white;
}