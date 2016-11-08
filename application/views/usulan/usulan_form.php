

<!-- <form method="POST">

     <div id="dynamicInput">

          Entry 1<br><input type="text" name="myInputs[]">

     </div>

     <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">

</form> -->

<!-- <div class="container">
  <div class="row">
    <input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another form field :)</small>
            </div>
        </div>
  </div>
</div> -->

<!DOCTYPE html>
<html>
<head>
    <title>HTML dynamic table using JavaScript</title>
    <script type="text/javascript" src="app.js"></script>
</head>
<body onload="load()">
<div id="myform">
<b>Simple form with name and age ...</b>
<table>
    <tr>
        <td>Name:</td>
        <td><input type="text" id="name"></td>
    </tr>
    <tr>
        <td>Age:</td>
        <td><input type="text" id="age">
        <input type="button" id="add" value="Add" onclick="Javascript:addRow()"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</div>
<div id="mydata">
<b>Current data in the system ...</b>
<table id="myTableData"  border="1" cellpadding="2">
    <tr>
        <td>&nbsp;</td>
        <td><b>Name</b></td>
        <td><b>Age</b></td>
    </tr>
</table>
&nbsp;<br/>
</div>
<div id="myDynamicTable">
<input type="button" id="create" value="Click here" onclick="Javascript:addTable()">
to create a Table and add some data using JavaScript
</div>
</body>
</html>