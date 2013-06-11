# Component: `archive`, Version 0.0.3 Alpha

A Mokuji component to create archives with sharing options.


## Planning

### Must haves (required for 0.1.0-beta)
* Create new archives (for admins)
* Create archive entries
* Modify archive entries (without versioning)
* Deprecate archive entries (no deleting yet)
* Sharing options (public / logged in users / selective groups / private)
* Image uploader for archive entry image
* Use single language mode for an entry (ask user to specify entry language as a required field)

### Should have (could be in 0.1.0-beta, required for 0.2.0-beta)
* Attachment handling
* Community component integration to specify which groups have access
* Associate entries with a group
* Entry level overrides for who has access
* Setting whether or not an archive should delete or deprecate entries

### Could have (keep the option in mind, but not scheduled)
* Tag handling
* Multi-language support for input fields
* Setting and functionality to allow normal users to create archives
* Default settings for new archives
* Which archive settings can be overridden when normal users create one
* Override sharing options per entry
* Ability to configure attachment limitations
* Integrate a backup component and create backup jobs based on backup schemes
* Version archiving on modification (including a reference to each version and description of the changes, commit message style)
* Grant access to individual users (besides just groups)

### Won't have (things that crossed our minds but are not going to happen)
* Built in backup system (this should be delegated to a backup component)


## Structure

* Archive
  - Owner ID
  - Title
  - Description
  - Datetime created
  - Datetime last modified (entry creation / modification also bumps this value)
  - Archive settings
      * Sharing options (public / logged in users / selective groups / private)
      * Allow sharing options to be overridden per entry
      * Allow sharing options per entry to exclude members/groups that normally would have access, or just add additional ones
      * Backup scheme and interval
      * Attachment limitations (size, amount, extensions)
      * Whether or not to actually delete items (deprecate vs delete)
      * Whether or not to archive versions (on modification)
  - Archive entries
      * Entry #1 (multilingual)
          - Posted by user ID
          - Associated with group ID (optional)
          - Single language ID (when the entry has not been translated, used as meta-information)
          - Title
          - Description
          - Full text
          - Tags
          - Image (optional)
          - Datetime added
          - Datetime last modified
          - Sharing options (if allowed)
          - Attachment #1 (optional)
              * File ID
              * Language of the contents (ID / not applicable / unknown)
          - Attachment #2 (optional)
          - Attachment #... (optional)
          - Attachment #n (optional)
      * Entry #2 (multilingual)
      * Entry #... (multilingual)
      * Entry #n (multilingual)
* Global settings (per site in multi-site setup)
  - Whether or not to allow normal users to create archives
  - Which archive settings can be overridden when normal users create one
  - Default settings for new archives (or fixed values if they are configured not to be overridden)
