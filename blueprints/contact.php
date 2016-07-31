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
      required:
        type: checkbox
        text: Required