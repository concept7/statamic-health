# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project overview

A Laravel package that provides Statamic-specific health checks built on top of [spatie/laravel-health](https://github.com/spatie/laravel-health). All checks extend `Spatie\Health\Checks\Check` and return a `Result` object.

**Namespace:** `Concept7\Health\`

## Commands

```bash
composer test          # Run Pest test suite
composer test-coverage # Run tests with coverage report
composer analyse       # PHPStan static analysis (level 5)
composer format        # Format code with Laravel Pint
composer build         # Build the workbench (testbench app)
composer start         # Build + serve the workbench app
```

Run a single test file:
```bash
vendor/bin/pest tests/GitLockCheckTest.php
```

## Architecture

**`src/HealthServiceProvider.php`** — Registers the package and auto-registers health checks on boot (currently `GitLockCheck`).

**`src/Checks/`** — All health checks live here:
- `GitLockCheck` — Detects presence of `.git/index.lock`
- `DuplicateIdsCheck` — Scans Statamic's Stache stores for duplicate entry IDs
- `UnconfiguredIndexesCheck` — Stub, always returns ok

**`tests/TestCase.php`** — Base test case with helpers for creating Statamic users, collections, and entries via Orchestra Testbench.

**`workbench/`** — The Testbench workbench app used for development and testing.

## Adding a new health check

1. Create `src/Checks/YourCheck.php` extending `Spatie\Health\Checks\Check`
2. Implement the `run(): Result` method
3. Register it in `HealthServiceProvider::boot()` alongside the existing checks
4. Add a test in `tests/YourCheckTest.php`
