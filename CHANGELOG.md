# Changelog

All notable changes to `statamic-health` will be documented in this file.

## v0.0.3 - 2026-04-16

### Fixed

- Register checks as instances instead of class strings to prevent boot error

## v0.0.2 - 2026-04-16

### Changed

- Support Laravel 11 and 12

## v0.0.1 - 2026-04-02

### Added

- `GitLockCheck` — detects presence of `.git/index.lock`
- `DuplicateIdsCheck` — scans Statamic Stache for duplicate entry IDs
