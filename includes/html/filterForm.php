
<form id="filterForm">
        <label  style="width:10%" for="per_page">#stars:</label>
        <input type="number" id="stars" name="stars" value="1" style="padding:6px; width:15%" min="1">
        <label  for="per_page" style="width:10%">#repositories:</label>
        <input type="number" id="per_page" name="per_page" min="1"   value="10" style="padding:6px; width:15% ">
        <label for="language" style="width:10%" >Language:</label>
        <input type="text" style="width:15%" id="language" name="language">
        <label for="date" style="width:10%">Creation Date:</label>
        <input type="date" id="creation_date" name="creation_date" style="padding:6px; width:15%;">

        <input type="submit" value="Filter">
    </form>
