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
  contact_message_headline:
    label: Form Messages
    type: headline
  contact_message_fillout:
    label: Introduction
    type: textarea
    required: true
    default: >
      Please fill out the form below.
  contact_message_success:
    label: Success
    type: textarea
    required: true
    default: >
      Your submission was accepted. 
      Thank you.
  contact_message_failed:
    label: Failed
    type: textarea
    required: true
    default: >
      Your submission was somehow screwed. 
      Please try again or contact the administrator.
  contact_message_no_file:
    label: No Data File
    type: textarea
    required: true
    default: >
      No data file provided. Your submission was lost.
      Please contact the administrator.