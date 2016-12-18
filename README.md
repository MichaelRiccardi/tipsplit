# Pre-work - tipsplit

**tipsplit** is a tip calculator PHP page.

Submitted by: **Michael Riccardi**

Time spent: **9 hours spent in total**

## User Stories

The following **required** functionality is complete:
* [X] User can enter a bill amount, choose a tip percentage, and submit the form to see the tip and total values.
* [X] Tip percentage choices use a PHP loop to output three radio buttons.
* [X] PHP code sets reasonable default values for the form.
* [X] PHP code confirms the presence and correct format of submitted values.
* [X] Page indicates any form errors which need to be fixed.
* [X] Submitted form values are retained when errors or results are shown.

The following **optional** features are implemented:
* [X] Add support for custom tip percentage
* [X] Add support for splitting the tip and total

The following **additional** features are implemented:
* [X] Clean UI that is aesthetically pleasing and displays well on varied screen sizes, including mobile devices.
* [X] For discounted checks, the user can enter the full and discounted amounts and have a tip calculated based on the original price, but the total based on the discount. it ('It is common practice to tip on the full amount of a meal that has been discounted. The tip is intended as a "thank you" to the restaurant staff, while it's typically the business that applies the discount - the staff performs the same service no matter what the final check is.' Source: [Business Insider](http://www.businessinsider.com/how-to-tip-on-discounted-meals-2012-3))
* [X] JavaScript that enhances the user experience:
    * Live updates between (1) "person" and (>1) "people" for the "Split" field.
    * Selecting the "Custom" tip radio button when the user clicks to input a numeric value.
    * Hiding "Discounted subtotal" when the user selects no discount.
* [X] Currency thousands separator in the results (though not in the inputs)

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/XAUiywQ.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Implementing the PHP functionality was not really challenging once I got a good structure set up. I was surprised to find more quirks with implementing the UI and getting everything to display how I wanted. While Bootstrap is a powerful tool for CSS, it is also somewhat complex to use and a lot of the custom styling I simply wrote myself in `custom.css`.

## License

    Copyright 2016 Michael Riccardi

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
    
**External Resource:**

    Bootstrap v3.3.7 (http://getbootstrap.com)
    Copyright 2011-2016 Twitter, Inc.
    Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
    
