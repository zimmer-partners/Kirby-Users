<?php if(!defined('KIRBY')) exit ?>

title: Login
pages: 
  template:
    - account
files: false
icon: sign-in
fields:
  title:
    label: Title
    type:  text
    default: Login
  username_label:
    label: Username Label
    type: text
    default: Username
    required: true
  password_label:
    label: Password Label
    type: text
    default: Password
    required: true
  button_label:
    label: Button Label
    type: text
    default: Login
    required: true
  user_account_page:
    label: Account Page
    type: select
    required: true
    options: query
    query:
      page: /
      fetch: pages
      template: account
      value: '{{uri}}'
      text: '{{title}}'
  alert:
    label: Alert
    type: text
    default: >
      Invalid username or password.