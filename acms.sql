CREATE DATABASE acms;

USE acms;

CREATE TABLE login ( id SMALLINT NOT NULL AUTO_INCREMENT, user VARCHAR(40) NOT NULL UNIQUE, pass VARCHAR(255) NOT NULL, PRIMARY KEY (id) ); 

INSERT INTO login (user, pass) VALUES ("Dan",MD5('passwordacms'));

CREATE TABLE articles ( id SMALLINT NOT NULL AUTO_INCREMENT, article VARCHAR(40) NOT NULL UNIQUE, articleDescription TEXT NOT NULL, articleLink VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY (id)); 

INSERT INTO articles (article, articleDescription, articleLink) 
VALUES 
("IT Accessibility Checklist",
"Checklist based on WCAG 2.0 Level A and AA standards.",
"https://www.washington.edu/accessibility/checklist/"),
("WCAG 2.0 Checklist",
"The Web Content Accessibility Guidelines 2.0 Checklist serves as an appendix to Web Content Accessibility Guidelines 2.0 [WCAG20]. It lists all of the success criteria from WCAG 2.0 in a checkable list. The level of each success criterion is provided as well as a link to WCAG 2.0 for more information for each success criterion. For many readers, the Checklist provides a quick reference and overview to the information in WCAG 2.0.",
"https://www.w3.org/TR/2006/WD-WCAG20-20060427/appendixB.html"),
("Evaluation Tools List",
"Web accessibility evaluation tools are software programs or online services that help you determine if web content meets accessibility guidelines. This page provides a list of evaluation tools that you can filter to find ones that match your particular needs. To determine what kind of tool you need and how they are able to assist you, see Selecting Web Accessibility Evaluation Tools.",
"https://www.w3.org/WAI/ER/tools/"),
("Media Accessibility",
"Captions and screen reader descriptions are the only way many users can experience your videos, and in some jurisdictions, they're even required by law or regulation.",
"https://web.dev/media-accessibility/"),
("ARIA Techniques",
"ARIA defines semantics that can be applied to elements, with these divided into roles (defining a type of user interface element) and states and properties that are supported by a role. Authors must assign an ARIA role and the appropriate states and properties to an element during its life-cycle, unless the element already has appropriate ARIA semantics (via use of an appropriate HTML element). Addition of ARIA semantics only exposes extra information to a browser's accessibility API, and does not affect a page's DOM.",
"https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Techniques"),
("Keyboard Accessibility",
"Keyboard accessibility is one of the most important aspects of web accessibility. Many users with motor disabilities rely on a keyboard.",
"https://webaim.org/techniques/keyboard/"),
("Accessible Websites Checklist",
"Eight parts of websites to check and alter to help to make websites accessible. The information below is based on the Web Content Accessibility Guidelines (WCAG) 2.0.",
"http://www.disability.wa.gov.au/Global/Publications/Understanding%20disability/Built%20environment/Accessible%20websites%20checklist.pdf"),
("WAI Test Evaluate",
"This page links to resources to help evaluate web accessibility. Accessibility evaluation is also called “assessment”, “audit”, and “testing”.",
"https://www.w3.org/WAI/test-evaluate/"),
("Screen readers",
"It is definitely worth testing with a screenreader to get used to how severely visually impaired people use the Web. There are a number of screenreaders available",
"https://developer.mozilla.org/en-US/docs/Learn/Tools_and_testing/Cross_browser_testing/Accessibility#screenreaders"),
("Developer tools",
"Every modern web browser includes a powerful suite of Every modern web browser includes a powerful suite of developer tools. These tools do a range of things, from inspecting currently-loaded HTML, CSS and JavaScript to showing which assets the page has requested and how long they took to load. This article explains how to use the basic functions of your browser's devtools.. These tools do a range of things, from inspecting currently-loaded HTML, CSS and JavaScript to showing which assets the page has requested and how long they took to load. This article explains how to use the basic functions of your browser's devtools.",
"https://developer.mozilla.org/en-US/docs/Learn/Common_questions/What_are_browser_developer_tools");

CREATE TABLE tools ( id SMALLINT NOT NULL AUTO_INCREMENT, tool VARCHAR(40) NOT NULL UNIQUE, toolDescription TEXT NOT NULL , toolLink VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY (id));

INSERT INTO tools (tool, toolDescription, toolLink) 
VALUES 
("Wave Report",
"WAVE is a suite of evaluation tools that helps authors make their web content more accessible to individuals with disabilities.",
"https://wave.webaim.org/"),
("Color A11y",
"This color contrast tool enables users to check url's to comply with website accessibilities regulations.",
"https://color.a11y.com/?wc3"),
("Snook Technical Colour Contrast",
"The Colour Contrast Check Tool allows to specify and adjust a foreground and a background colour and determine if they provide enough of a contrast.",
"https://snook.ca/technical/colour_contrast/colour.html"),
("Cynthiasays",
"Using this free service will expose you to the underlying technology and benefits of using Compliance Sheriff's full-featured solutions for automated monitoring and testing against Web accessibility and other Web governance standards.",
"http://www.cynthiasays.com/"),
("CSS validator w3",
"The W3C CSS Validation Service is a free software created by the W3C to help Web designers and Web developers check Cascading Style Sheets (CSS). It can be used on this free service on the web, or downloaded and used either as a java program, or as a java servlet on a Web server.",
"http://jigsaw.w3.org/css-validator/"),
("HTML validator w3",
"This validator checks the markup validity of Web documents in HTML, XHTML, SMIL, MathML, etc.",
"http://validator.w3.org/");

CREATE TABLE mimetypes ( 
    mimetype_id INT UNSIGNED AUTO_INCREMENT, 
    mimetype VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (mimetype_id)
);

INSERT INTO mimetypes (mimetype) VALUES ("image/jpeg");

CREATE TABLE files ( id SMALLINT NOT NULL AUTO_INCREMENT, filename VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, caption VARCHAR(255) NOT NULL, filedata MEDIUMBLOB , mimetype_id INT UNSIGNED NOT NULL, PRIMARY KEY (id),FOREIGN KEY (mimetype_id) REFERENCES mimetypes(mimetype_id)); 

INSERT INTO files (filename, alt, caption, mimetype_id) VALUES ("galleryaccesstool.jpeg", "A man using a computer access tool", "Computer access tool", 1),("gallerystepfreeroute.jpeg", "Signage indicating a step free route", "Step free route", 1);