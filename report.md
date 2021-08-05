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
After loading the data set creates  a tree structure before beginning parsing.

DOM is much less efficient than streaming in larger files due to it's requirement of loading into memory, this is especially the case when disk space is used as a substitute for memory in cases where the file is larger than the RAM of the given system. The streaming process is linear in terms of it's parsing of size, and is generally only limited by 'depth' of the XML file as opposed to the size of the full document, according to sources [1](https://www.devx.com/xml/Article/16922/0/page/2) and [2]([http://www.saxproject.org/) (retrieved 05/08/2021)

The streaming processing model (most commonly SAX) loads predefined 'chunks' of a file before parsing, some information is kept in memory being the currently open tags, and the current 'chunk' being processed.

The streaming processing model is generally more efficient (in resources and time) at simple processing tasks, such as indexing and formatting, however more complex tasks such as sorting are less efficient than its DOM counterpart, largely due to the initial tree structure creation in the DOM.

Streaming model has developments in parallel streaming for handling larger volumes of data/time as shown in Song et al (2016, p, 1975-1986)

Usage of both methods in conjunction shown in Figure 6. of Dai et al (2010, p, 199-208) however this research is 11 years old at point of writing, and is not currently in amateur usage, as implementation without outside tooling is complex.

A commercial application of combining the 2 approaches





## Discussion Extending Visualisation



## Evaluation of Learning Outcomes Achieved

- Learn to model, cleanse & normalize substantial real-world big data (188 mb+);
- Understand the data cleansing and normalization processes by writing PHP scripts to process and convert the data to first (cleansed) CSV and then (normalized) XML;
- Gain knowledge and skill in the design, implementation & visualisation of data using web based charting and mapping API's.
- Fulfil the submission requirement of providing the two conversion scripts for benchmarking and one XSD schema file for validation purposes.
- Extend your skills in the use use of key technologies: PHP, XML & XPATH, Parsing, DOM, JavaScript & JSON.
- Learn and use markdown syntax.

### Assessment of Data Cleansing and Normalisation

Divided big data into separate file (div and conq)



Removed useless data (cleaning identified data w/ bad values), restructured into more desirable format.



Cleaning completed



XML normalisation


Creation of the tags



Formatting of XML



### Charting and mapping



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

  * The usage of $fgetcsv()$ 

* DOM

* JavaScript

* JSON



### Markdown Usage

Since markdown is a tool used widely in GitHub '.readME' files I had experience with the format prior to this project for documentation, as well as for reports in prior modules.

Using the application 'Typora' for editing markdown files, has lowered the skill requirements for markdown as large portions of the 'source code' are obfuscated.
Therefore in this project vscode with a preview window was chosen to edit the markdown files.

Addition of links(within doc, web, and local files), images, and code blocks within the markdown file, shows proficient usage with the technology.

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

### Websites

[XML Parsers: DOM and SAX Put to the Test]([XML Parsers: DOM and SAX Put to the Test : Page 2 (devx.com)](https://www.devx.com/xml/Article/16922/0/page/2))

[Official SAX]([http://www.saxproject.org/)





[top of page](#Advanced Topics in Web Development 2)

