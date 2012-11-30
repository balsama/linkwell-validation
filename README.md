linkwell-validation
===================

Function to generate and examples of Linkwell Link Validation

USAGE:
# Copy and include the secure-links.inc file in your app.
# Call the generate_secure_link() function to generate the valid URL
# Use the valid URL wherever you link to your Linkwell property
# See the secure-links.inc file for more information

NOTE:
If your app caches pages, it might be necesary to regenerate and dynamically
insert the Valid URL where appropriate as the generated URLs are only valid
for the amount of time defined in the $duration parameter.
