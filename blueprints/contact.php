<?php if(!defined('KIRBY')) exit ?>

title: Contact
pages: true
files: true
icon: envelope
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type: textarea
  contact_form_configuration:
    label: Contact Form Settings
    type: headline
  contact_to:
    label: To Address
    type: email
    required: true
  contact_from:
    label: From Label
    type: text
    default: From
  contact_subject:
    label: Subject Label
    type: text
    required: true
    default: Subject
  contact_body_placeholder:
    label: Body Placeholder
    type: textarea
  button_label:
    label: Button Label
    type: text
    default: Send
    required: true
  contact_denied:
    label: Access Denied Message
    type: text
  contact_fields:
    label: Additional fields
    type: structure
    fields:
      label:
        label: Label
        type: text
      prefill:
        label: Prefill
        type: text
        help: >
          Enter the key of a user field to use as default.
      required:
        type: checkbox
        text: Required
      disabled:
        type: checkbox
        text: Disabled
  contact_data_file:
    label: Data File Name
    type: text
    default: data.php
    required: true
    help: >
      Attention: Providing any other file extension 
      than <code>.php</code> might expose data to 
      anyone knowing the url of the data file.