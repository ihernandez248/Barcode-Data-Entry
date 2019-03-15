# Scanner Data Entry
Scan barcodes and automatically enter data to sql database. View and search your entries in an easy-to-read table.


## Scan Mode

Access Scan Mode by clicking the "Scan Mode" Button on the main screen.

Then to enter data simply start scanning. The text field is automatically set onFocus on each page load so there is no need to click the text box every time. If using a scanner to enter data, typically they pass the data with an addition bit of information the automatically "hits" enter or clrf. This allows for each scan to automatically send the data to the database.

With each entry the database automatically records the date and time the entry was submitted and has an auto-incrementing value called id that serves the purpose of a unique entry id.


## View Mode

Access View Mode by clicking the "View Mode" Button on the main screen.

In view mode, users can view all the data in the database with up to date entries. All in an easy to digest table. The table is organized in chronological order. However, in the case that a user may need to find past entries a user has the ability to search any content in the table. Either by id,user,or date/time.
