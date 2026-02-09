# Zphisher Deployment Guide

This document provides comprehensive instructions for deploying Zphisher in various environments.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Deployment Methods](#deployment-methods)
  - [1. Direct Installation](#1-direct-installation)
  - [2. Docker Deployment](#2-docker-deployment)
  - [3. Docker Compose](#3-docker-compose)
  - [4. Debian Package Installation](#4-debian-package-installation)
  - [5. Termux Installation](#5-termux-installation)
- [Configuration](#configuration)
- [Troubleshooting](#troubleshooting)

## Prerequisites

Before deploying Zphisher, ensure you have the following:
- Git (for cloning the repository)
- Bash shell
- Internet connection
- One of the following based on deployment method:
  - PHP, curl, unzip (for direct installation)
  - Docker (for containerized deployment)
  - Debian-based system (for .deb package)
  - Termux (for Android)

## Deployment Methods

### 1. Direct Installation

This is the simplest method for Linux/Unix systems.

```bash
# Clone the repository
git clone --depth=1 https://github.com/htr-tech/zphisher.git

# Navigate to the directory
cd zphisher

# Run the tool (dependencies will be installed automatically on first run)
bash zphisher.sh
```

**Pros:**
- Simple and straightforward
- No additional tools required
- Auto-installs dependencies

**Cons:**
- Requires manual dependency installation on some systems
- No isolation from host system

### 2. Docker Deployment

Deploy using Docker for better isolation and portability.

#### Using Pre-built Image

```bash
# Pull from Docker Hub
docker pull htrtech/zphisher

# Or pull from GitHub Container Registry
docker pull ghcr.io/htr-tech/zphisher:latest

# Run in temporary container
docker run --rm -ti --network="host" -v $(pwd)/auth:/zphisher/auth htrtech/zphisher
```

#### Using the Wrapper Script

```bash
# Download the wrapper script
curl -LO https://raw.githubusercontent.com/htr-tech/zphisher/master/run-docker.sh

# Run the script
bash run-docker.sh
```

The wrapper script will:
- Create an `auth` directory for storing credentials
- Create and start a persistent container
- Mount the `auth` directory to preserve data

#### Building from Source

```bash
# Clone the repository
git clone --depth=1 https://github.com/htr-tech/zphisher.git
cd zphisher

# Build the image
docker build -t zphisher:local .

# Run the container
docker run --rm -ti --network="host" -v $(pwd)/auth:/zphisher/auth zphisher:local
```

**Pros:**
- Isolated environment
- Consistent across systems
- Easy cleanup

**Cons:**
- Requires Docker installation
- Slightly larger footprint

### 3. Docker Compose

Use Docker Compose for easier container management.

```bash
# Clone the repository
git clone --depth=1 https://github.com/htr-tech/zphisher.git
cd zphisher

# Start the service
docker-compose up -d

# Attach to the running container
docker attach zphisher

# To stop
docker-compose down
```

**Pros:**
- Easy to manage
- Declarative configuration
- Simple restart and cleanup

**Cons:**
- Requires Docker Compose installation

### 4. Debian Package Installation

Install as a system package on Debian-based distributions.

#### From Release

```bash
# Download the .deb file from releases (replace <version> with actual version, e.g., 2.3.5)
wget https://github.com/htr-tech/zphisher/releases/latest/download/zphisher_<version>_all.deb

# Install using apt
sudo apt install ./zphisher_<version>_all.deb

# Or using dpkg
sudo dpkg -i zphisher_<version>_all.deb
sudo apt install -f  # Install dependencies if needed

# Run
zphisher
```

#### Building from Source

```bash
# Clone the repository
git clone --depth=1 https://github.com/htr-tech/zphisher.git
cd zphisher

# Build the package
bash make-deb.sh

# Install (replace <version> with the actual built version)
sudo apt install ./zphisher_<version>_all.deb
```

**Pros:**
- System-wide installation
- Proper package management
- Easy updates and removal

**Cons:**
- Debian-based systems only
- Requires root access

### 5. Termux Installation

For Android devices using Termux.

#### Using TUR (Termux User Repository)

```bash
# Install TUR repository
pkg install tur-repo

# Install Zphisher
pkg install zphisher

# Run
zphisher
```

#### Manual Installation

```bash
# Install dependencies
pkg install git curl php

# Clone repository
git clone --depth=1 https://github.com/htr-tech/zphisher.git
cd zphisher

# Run
bash zphisher.sh
```

#### Using .deb Package

```bash
# Download Termux-specific .deb (replace <version> with actual version)
wget https://github.com/htr-tech/zphisher/releases/latest/download/zphisher_<version>_all_termux.deb

# Install
pkg install ./zphisher_<version>_all_termux.deb

# Run
zphisher
```

**Pros:**
- Works on Android
- Portable security testing

**Cons:**
- Limited to Termux environment

## Configuration

### Auth Directory

Zphisher stores captured credentials and IP addresses in the `auth/` directory:
- `auth/usernames.dat` - Captured credentials
- `auth/ip.txt` - Victim IP addresses

Make sure this directory exists and has proper permissions:

```bash
mkdir -p auth
chmod 700 auth
```

### Environment Variables

When using Docker, you can customize the deployment:

```bash
# Custom auth directory location
docker run --rm -ti --network="host" \
  -v /custom/path/auth:/zphisher/auth \
  htrtech/zphisher
```

### Port Configuration

Zphisher uses PHP's built-in server, which typically runs on port 8080 or a random port. Ensure the required ports are accessible.

## Troubleshooting

### Common Issues

#### Issue: Dependencies not installing
**Solution:** Manually install required packages:
```bash
# For Debian/Ubuntu
sudo apt update
sudo apt install git curl php unzip

# For Arch
sudo pacman -S git curl php unzip

# For Termux
pkg install git curl php unzip
```

#### Issue: Docker container not starting
**Solution:** 
1. Check if Docker daemon is running: `sudo systemctl status docker`
2. Ensure you have proper permissions: `sudo usermod -aG docker $USER`
3. Try rebuilding the image: `docker build --no-cache -t zphisher:local .`

#### Issue: Port already in use
**Solution:** Stop the service using the port or choose a different port:
```bash
# Find process using the port
sudo netstat -tulpn | grep :8080

# Kill the process
sudo kill -9 <PID>
```

#### Issue: Permission denied errors
**Solution:**
1. Ensure scripts are executable: `chmod +x zphisher.sh`
2. For system-wide installation, use sudo
3. Check auth directory permissions: `chmod 700 auth`

#### Issue: Network tunneling not working
**Solution:**
1. Ensure you have internet connectivity
2. Check if tunneling service (Cloudflared/LocalXpose) is accessible
3. Try a different tunneling option from the menu

### Docker-Specific Issues

#### Issue: Volume mount not working
**Solution:** Use absolute paths:
```bash
docker run --rm -ti --network="host" \
  -v "$(pwd)/auth:/zphisher/auth" \
  htrtech/zphisher
```

#### Issue: Container exits immediately
**Solution:** Ensure interactive mode is enabled with `-ti` flags

### Getting Help

If you encounter issues not covered here:
1. Check existing issues: https://github.com/htr-tech/zphisher/issues
2. Read the FAQ in README.md
3. Open a new issue with detailed information about your problem

## Security Notes

**Important:** Zphisher is designed for educational and authorized security testing purposes only. 

- Always obtain proper authorization before testing
- Never use on systems you don't own or have permission to test
- Misuse can result in criminal charges
- Follow all applicable laws and regulations

## Updates

To update Zphisher:

### Direct Installation
```bash
cd zphisher
git pull
bash zphisher.sh
```

### Docker
```bash
docker pull htrtech/zphisher:latest
# Or
docker pull ghcr.io/htr-tech/zphisher:latest
```

### Package Installation
```bash
# Download new .deb from releases (replace <new_version> with actual version)
sudo apt install ./zphisher_<new_version>_all.deb
```

## Uninstallation

### Direct Installation
```bash
rm -rf zphisher/
```

### Docker
```bash
docker rm -f zphisher
docker rmi htrtech/zphisher:latest
```

### Package Installation
```bash
sudo apt remove zphisher
```

### Termux
```bash
pkg uninstall zphisher
```

## Additional Resources

- Main Repository: https://github.com/htr-tech/zphisher
- Docker Hub: https://hub.docker.com/r/htrtech/zphisher
- GHCR: https://github.com/htr-tech/zphisher/pkgs/container/zphisher
- Issues: https://github.com/htr-tech/zphisher/issues
- Releases: https://github.com/htr-tech/zphisher/releases
