#!/bin/bash

# Extract version number from src/imagely.php
version=$(grep -oP 'Version:\s*\K[0-9]+(\.[0-9]+)*' src/imagely.php)

# Zip src file
cp -r src imagely && zip -rT0 imagely-${version}.zip imagely && rm -r imagely