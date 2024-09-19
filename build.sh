#!/usr/bin/env bash

# always start in script's directory, exit if fails
cd "${0%/*}" || exit 1

# Create builder with multiplatform support
# docker buildx create --name mybuilder
# docker buildx use mybuilder

docker buildx build -t petskratt/burn-after-running:latest --platform linux/arm64,linux/amd64 --push .
