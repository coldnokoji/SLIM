<?php header("Content-type: text/css"); ?>
<?php
require_once "config.php";
// $SelectedLab = $_COOKIE['SelectedLab'];
$sql = "SELECT * FROM `devices`";
$all_pc_info = getAllValues($sql);
?>

<?php foreach ($all_pc_info as $pc_info) {
    
    
        if ($pc_info['isworking']==1) {
            $bgcol = '#DFFFCB';
        } else {
            $bgcol = '#FFCBCB';
        }


?>

.Item-icon<?php echo $pc_info['pcno'];?>{
width: 120px;
height: 71px;
text-align: center;
border: 1px solid rgb(71, 71, 71);
background-color: <?php echo $bgcol;?>;
padding: 20px;
padding-top: 30px;
}
<?php
}

?>

*{
margin: 0;
padding: 0;
}
.NavContainer{
display: flex;
justify-content: space-between;
height: 87px;
align-items: center;
background-color: #fff9f9;
}

.logo{
margin: 10px;
margin-left: 50px;
}
.logo h1{
color: #83D8FD;
font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}
.NavItem a{
margin: 10px;
text-decoration: none;
}
.NavItem i{
margin: 10px;
margin-right: 30px;
margin-left: 100px
}

.ActionBar{
height: 75px;
align-items: center;
padding-top: 10px;
border: 1px solid black;
display: flex;
justify-content: space-between;
}

.Dep , .lab {
display: inline-block;
margin-left: 20px;
}
.buttons button{
margin-right: 30px;
}

.Hero{
display: flex;
}
.SideNav{
box-sizing: border-box;
width: 20vw;
height: 70vh;

background: #FFF9F9;
border: 1px solid rgba(0, 0, 0, 0.1);
border-radius: 2px;
}

.Grid-container{
display: grid;
grid-template-columns: repeat(4, 1fr);
grid-template-rows: repeat(auto-fill, 107px);
column-gap: 10px;
row-gap: 20px;
padding: 20px;
height: 70vh;
width:40vw;
overflow-y: scroll;

}


.Grid-item{
border: 1px solid rgb(71, 71, 71)black;
height: 107px;
}


.Item-button button{

width: 120px;
height: 36px;
border: 1px solid rgb(71, 71, 71);
background: rgb(57 137 255 / 58%);
}

.footer{
height: 50px;
margin-top:10px;
background-color: #f5f5f5;
overflow: hidden;
}

/* width */
::-webkit-scrollbar {
width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px grey;
border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
background: #756d6d;
border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
background: #555;
}

#imageChanger{
    display: flex;
    align-content: center;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding:20px;
    padding-top: 20px;
}
.TTImage{
    width: 40vw;
    height: 55vh
}

.LayoutBtn{

width: 8vw;
height: 36px;
border-radius:20px;
border:none;
background:lightgrey;
}
.TTBtn {

width: 8vw;
height: 36px;
border-radius:20px;
border:none;
background:lightgrey;
}

.LayoutBtn:hover, .LayoutBtn:focus{
width: 8vw;
height: 36px;
border-radius:20px;
border: 1px solid rgb(71, 71, 71);
background:grey;
}

.TTBtn:hover, .TTBtn:focus{
width: 8vw;
height: 36px;
border-radius:20px;
border: 1px solid rgb(71, 71, 71);
background:grey;
}

.EditBtn{

width: 6vw;
height: 36px;
border: 1px solid rgb(71, 71, 71);
background: rgb(57 137 255 / 58%);
}

input{
    margin:5px;
    padding:5px;
}