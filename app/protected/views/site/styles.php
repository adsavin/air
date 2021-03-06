label {
display: inline-block;
width: 150px;
text-align: right;
}
.form-control {
display: inline-block;
}
form div {
padding: 2px;
}

/* dropdown */
.dropdown-submenu {
position:relative;
}
.dropdown-submenu > .dropdown-menu {
top:0;
left:100%;
margin-top:-6px;
margin-left:-1px;
-webkit-border-radius:0 6px 6px 6px;
-moz-border-radius:0 6px 6px 6px;
border-radius:0 6px 6px 6px;
}
.dropdown-submenu:hover > .dropdown-menu {
display:block;
}
.dropdown-submenu > a:after {
display:block;
content:" ";
float:right;
width:0;
height:0;
border-color:transparent;
border-style:solid;
border-width:5px 0 5px 5px;
border-left-color:#cccccc;
margin-top:5px;
margin-right:-10px;
}
.dropdown-submenu:hover > a:after {
border-left-color:#ffffff;
}
.dropdown-submenu .pull-left{
float:none;
}
.dropdown-submenu.pull-left > .dropdown-menu {
left:-100%;
margin-left:10px;
-webkit-border-radius:6px 0 6px 6px;
-moz-border-radius:6px 0 6px 6px;
border-radius:6px 0 6px 6px;
}

/* Error */
.errorSummary {
padding: 10px;
border: red 1px solid;
background: #ffe1e1;
margin-bottom: 10px;
-webkit-border-radius:6px 6px 6px 6px;
-moz-border-radius:6px 6px 6px 6px;
border-radius:6px 6px 6px 6px;
color: red;
}

/* Table */
.grid-view .items thead tr th {
padding: 5px;
font-size: 14px;
font-weight: normal;
}
.grid-view .items tbody tr td {
padding: 5px;
font-size: 14px;
}

/* toolbar */
.mynav {
border-bottom: #cccccc 1px solid;
padding: 0px;
display: inline-block;
width: 100%;
background: #f2f5f6;
}

.mynav ul li a {
padding: 10px;
}

.mynav ul li {
padding: 0px;
}

.flag{
    cursor: pointer;
}