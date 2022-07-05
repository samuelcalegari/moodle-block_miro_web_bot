# Miro Web Bot Block for Moodle #

## Current version ##

1.2

## Features ##
- Launch chat session with Miro Bot on a web client

## Supported languages ##
- English
- French

## Installation ##

- Copy files into the following directory **/blocks/miro_web_bot/** and visit **/admin/index.php** in your browser
- Enter the Authorization Bearer in block configuration
- If you want an additional button (ie located in the bottom of the page) : Check 'show button' and complete 'content' and 'style' fields (see more bellow)

## Button customisation ##

Here is a sample using fontawesome :

Content:

    <i class="fa fa-comments-o" aria-hidden="true"></i>
    <span class="sr-only">Discuter avec notre assistant virtuel</span>

Style:

    padding: .5rem 1rem;
    font-size: 1.2rem;
    line-height: 1.5;
    background-color: #0090b2;
    border-color: #0090b2;
    border-radius: 0;
    color: #fff;
    position: fixed;
    bottom: 20px;
    right: 250px;
    z-index: 2;
    cursor: pointer;

## Requirement ##

Moodle 3.1 or greater.

## Licence ##

Released under the [MIT Licence](https://opensource.org/licenses/MIT)
