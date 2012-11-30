#linkwell-validation#

##Function to generate and examples of Linkwell Link Validation##

###USAGE:###
1. Copy and include the secure-links.inc file in your app.
2. Call the generate_secure_link() function to generate the valid URL
3. Use the valid URL wherever you link to your Linkwell property
4. See the secure-links.inc file for more information

> NOTE:
> If your app caches pages, it might be necesary to regenerate and dynamically
> insert the Valid URL where appropriate as the generated URLs are only valid
> for the amount of time defined in the $duration parameter.

###generate_secure_link() Description###
Generates a valid link to a protected Linkwell website.
Use of this function requires a pre-shared secrent known by the generating
generating party (You) and Validating party (Linkwell).

**Parameters:**
  + shared_secret: 
    > the pre-shared key. If you are unsure of what your
    > pre-shared key is, contact your Linkwell representative
  
  + duration:      
    > The duration for which the generated link is valid in
    > seconds. Linkwell recommends that you you set this
    > value to at least one hour to accommodate for server time
    > discrepencies and the fact that the link is generated
    > at page load and some time may expire while the user
    > browses the page.
                  
  + url:           
    > The URL of your Linkwell property including the path if
    > applicable. E.g.:
                     
    + http://savings.healthycoupons.com/emblemhealth
    + http://savings.healthycoupons.com/emblemhealth/recipes

**Return value:**
> A URL to be used as a link valid for the duration
> specified


**Example Return:**   http://example.com/example/path?s=e3c45709cf64a7fc36ca56aa93d72583&t=1354307684

###What Happens on the Other END?###
It's important to understand what the URL params included in the generated URL
contain.
  + s param:
    > MD5 hash of the pre-shared secret and the current UNIX timestamp
    > plus a given amount of time in seconds (e.g. 3600 seconds)

  + t param:
    > UNIX timestamp plus given amount of timeused to generate param 's'

At the validating end, a new hash is created with the timestamp provided in the
't' param and the pre-shared secret. The resulting hash is compared with the
hash provided in the 's' param. If the two hashes do NOT match, the
validation fails immediately. If the hashes do match we compare the validating
server's current timestamp with the provided timestamp. If the validating
server's cureent timestamp is greater than the provided timestamp, validation
fails because more than the allowed amount of time has passed. If it is less
than the provided timestamp, the link is valid.
