# Advanced Topics in Web Development 2

Name: Daniel Yates

Student#: 16023888

Module Code: UFCFR5-15-3



## Table of Contents

[Advanced Topics in Web Development 2](#Advanced Topics in Web Development 2)

1. [XML Processing Models](#XML Processing Models)
2. [Discussion Extending Visualisation](#Discussion Extending Visualisation)
3. [Evaluation of Learning Outcomes Achieved](#Evaluation of Learning Outcomes Achieved)
4. [Links to Files](#Links to Files)



## XML Processing Models

The DOM processing model loads a whole file into memory before parsing a given data set.
After loading the data set creates  a tree structure before beginning parsing, an example of this processing model would be $SimpleXML()$​.

The streaming processing model (most commonly SAX) loads predefined 'chunks' of a file before parsing, some information is kept in memory being the currently open tags, and the current 'chunk' being processed, an example of this processing model would be $XMLReader()$.

DOM is much less efficient than streaming in larger files due to it's requirement of loading into memory, this is especially the case when disk space is used as a substitute for memory in cases where the file is larger than the RAM of the given system. The streaming process is linear in terms of it's parsing of size, and is generally only limited by 'depth' of the XML file as opposed to the size of the full document, according to sources [1](https://www.devx.com/xml/Article/16922/0/page/2) and [2]([http://www.saxproject.org/) (retrieved 05/08/2021)

The streaming processing model is generally more efficient (in resources and time) at simple processing tasks, such as indexing and formatting, however more complex tasks such as sorting are less efficient than its DOM counterpart, largely due to the initial tree structure creation in the DOM.

Streaming model has developments in parallel streaming for handling larger volumes of data/time as shown in Song et al (2016, p, 1975-1986)
Usage of both methods in conjunction shown in Figure 6. of Dai et al (2010, p, 199-208) however this research is 11 years old at point of writing, and is not currently in amateur usage, as implementation without outside tooling is complex.

Examples of simpler and earlier implementations in comparison to the study are [DynaText Cern](http://info.cern.ch/hypertext/Products/DynaText/Overview.html) which is currently still in usage despite it's age, and [Soft Quad](https://www.xml.com/pub/a/SeyboldReport/ps261903.html) which failed due to company buyouts and controversy unrelated to the technology provided.

In conclusion for simpler tasks and larger datasets, streaming methods are likely to be more efficient in both time and memory, however for more complex tasks DOM is a better solution so long as data size is not a complete limitation, in cases such as this a method that blurs the lines between the two can often provide benefits from both of the processing models.





## Discussion Extending Visualisation

Extension of visualisation of the charts could consist of a number of features:

* Having filterable displays of data from locations.
* Having filterable display of which polluter is being displayed.
* Displaying a wider range of time (or customisable amount).
* Choosing which plot to display dynamically, rather than just both charts with dummy data.



## Evaluation of Learning Outcomes Achieved

- Learn to model, cleanse & normalize substantial real-world big data (188 mb+);
- Understand the data cleansing and normalization processes by writing PHP scripts to process and convert the data to first (cleansed) CSV and then (normalized) XML;
- Gain knowledge and skill in the design, implementation & visualisation of data using web based charting and mapping API's.
- Fulfil the submission requirement of providing the two conversion scripts for benchmarking and one XSD schema file for validation purposes.
- Extend your skills in the use use of key technologies: PHP, XML & XPATH, Parsing, DOM, JavaScript & JSON.
- Learn and use markdown syntax.

### Assessment of Data Cleansing and Normalisation

Division of the files using the $fget()$ method, followed by a simple switch case, handled the division of the files neatly.
While the files were open cleaning of the data before insertion into divided files, was required.
This was done through breaking apart the line into separate elements through the $explode()$ function.
In hindsight using $fgetcsv$​​​ while slower could have lead to more maintainable code given changing requirements (for insertion of more parameters).

Below is some pseudocode for task 1

```pseudocode
open big file
loop through opening all smaller CSV files //creating in process if not already in existance
while file is not at it's end{
	parse next line
	break up line into pieces
	identify required elements
	only take wanted elements, into correct position
	divide geocode into lat/long
	insert elements into array of required format
	
	insert the array into file based on station name
}

```

After the pseudo-code for this task was complete, the task was then needed to be implemented.
Errors due mismanagement of the $explode()$ function and misidentifying/assumptions about data types caused issues which were fixed through debugging tools in vscode.

The main improvement to this implementation aside from using $getcsv()$ would be to use the array of the datafiles for insertion of data as opposed to the hardcoded switch case.



### CSV to XML Normalisation

File for this section found here: [Task 2a PHP File](normalise-to-xml.php)

Initial creation of XML Data was done through the $XMLWriter()$​ functions.
Created elements, assigned attributes.
Used header line to create all of the inputted tags.
Looped through both arrays.

The main issue within this task was the formatting of the XML document in terms of spacing and indentation.
I was not able to find a solution within the time limit, thereby cutting the ability to do task 2b in terms of the XSD derliverable.



### Charting and Mapping

The charting and mapping section of this was incomplete, it mainly consisted of template code from google developers, with some values changed to see how the input array functioned.
With more development parsing the CSV, or XML files for the data, and inputting into a 2d array, and then passing the array as a variable to the google provided chart draw function.



### Technology Skill Extension

* PHP

  * Usage of looping for opening of files using concatenation of strings (in the $generateFileName$ function) was a combination of techniques not used prior to this coursework.
    While this was outside of spec it improved future usability and reduced brittleness of the code.

  * Debugging through finding type errors, when using the $fgetcsv()$​​​ function.

  * Finding what can break when using $explode()$ function.

    

* XML

  * Usage of XMLWriter within [task 2](https://github.com/YatesyTea/ATIWD2-CW/blob/main/normalise-to-xml.php) required basic understanding of the format, and required.
  * Formatting was not achieved in this task, therefore the task 2b was not able to be completed.

* Parsing

  * The usage of $fgetcsv()$​ to divide each line into an array was the key takeaway from this technology.
  * While this is slower (because it parses line by line) than $fget()$ it is also less brittle due to it's more thorough method of parsing.

* DOM

* JavaScript

  * Minimal usage of JavaScript was used within this project, this was due to task 3 being mostly incomplete.
  * Conversion of UNIX time --> time of day was the only feature of JavaScript that was learned in comparison to prior  experience with the technology.

* Markdown

  * Since markdown is a tool used widely in GitHub '.readME' files I had experience with the format prior to this project for documentation, as well as for reports in prior modules.

    Using the application 'Typora' for editing markdown files, has lowered the skill requirements for markdown as large portions of the 'source code' are obfuscated.
    Therefore in this project vscode with a preview window was chosen to edit the markdown files.

    Addition of links(within doc, web, and local files), images, and code blocks within the markdown file, shows proficient usage with the technology.

* GitHub

  * Simple init, branch, push, and pull commands were used in this project.



[top of page](#Advanced Topics in Web Development 2)



## Links to Files

Links as GitHub Links:

[GitHub Repository](https://github.com/YatesyTea/ATIWD2-CW)

[CSV Data](https://github.com/YatesyTea/ATIWD2-CW/tree/main/csvData)

[XML Data](https://github.com/YatesyTea/ATIWD2-CW/tree/main/xmlData)

[Task 1 PHP File](https://github.com/YatesyTea/ATIWD2-CW/blob/main/extract-to-csv.php)

* [As PHPS](https://github.com/YatesyTea/ATIWD2-CW/blob/main/extract-to-csv.phps)

[Task 2a PHP File](https://github.com/YatesyTea/ATIWD2-CW/blob/main/normalise-to-xml.php)

* [As PHPS](https://github.com/YatesyTea/ATIWD2-CW/blob/main/normalise-to-xml.phps)

[Task 3 File](https://github.com/YatesyTea/ATIWD2-CW/blob/main/api_chart.html)

Links as Local Links:

[CSV Data](csvData)

[XML Data](xmlData)

[Task 1 PHP File](extract-to-csv.php)

* [As PHPS](extract-to-csv.phps)

[Task 2a PHP File](normalise-to-xml.php)

* [As PHPS](extract-to-csv.phps)

[Task 3 File](api_chart.html)

## References

### Research Papers

Dai, Z., Ni, N. and Zhu, J., 2010, February. A 1 cycle-per-byte XML parsing accelerator. In *Proceedings of the 18th annual ACM/SIGDA international symposium on Field programmable gate arrays* (pp. 199-208). [link]([A 1 cycle-per-byte XML parsing accelerator (uwe.ac.uk)](https://dl-acm-org.ezproxy.uwe.ac.uk/doi/pdf/10.1145/1723112.1723148))

Song, K. and Lu, H., 2016. High-performance XML modeling of parallel queries based on MapReduce framework. *Cluster Computing*, *19*(4), pp.1975-1986. [link]([High-performance XML modeling of parallel queries based on MapReduce framework | SpringerLink (uwe.ac.uk)](https://link-springer-com.ezproxy.uwe.ac.uk/article/10.1007%2Fs10586-016-0628-z))

### Website Sources (Non Peer Reviewed)

[XML Parsers: DOM and SAX Put to the Test]([XML Parsers: DOM and SAX Put to the Test : Page 2 (devx.com)](https://www.devx.com/xml/Article/16922/0/page/2))

[Official SAX]([http://www.saxproject.org/)

[DynaText Cern](http://info.cern.ch/hypertext/Products/DynaText/Overview.html)

[SoftQuad 4 Announcement](https://www.xml.com/pub/a/SeyboldReport/ps261903.html)



[top of page](#Advanced Topics in Web Development 2)

