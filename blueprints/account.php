<?php if(!defined('KIRBY')) exit ?>

title: Account
pages: 
  template:
    - contact
files: true
icon: user
fields:
  title:
    label: Title
    type: text
  title_user:
    type: checkbox
    text: Use Username as Title when logged in.
  text:
    label: Text
    type: textarea
  logout_label:
    label: Logout Button
    type: text
    required: true
    default: 'Log Out'
  functions_heading:
    label: Functions Heading
    type: text
    default: Functions
    required: true