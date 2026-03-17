<!-- Zphisher -->

<p align="center">
  <img src=".github/misc/logo.png">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Version-2.3.5-green?style=for-the-badge">
  <img src="https://img.shields.io/github/license/htr-tech/zphisher?style=for-the-badge">
  <img src="https://img.shields.io/github/stars/htr-tech/zphisher?style=for-the-badge">
  <img src="https://img.shields.io/github/issues/htr-tech/zphisher?color=red&style=for-the-badge">
  <img src="https://img.shields.io/github/forks/htr-tech/zphisher?color=teal&style=for-the-badge">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Author-htr--tech-blue?style=flat-square">
  <img src="https://img.shields.io/badge/Open%20Source-Yes-darkgreen?style=flat-square">
  <img src="https://img.shields.io/badge/Maintained%3F-Yes-lightblue?style=flat-square">
  <img src="https://img.shields.io/badge/Written%20In-Bash-darkcyan?style=flat-square">
  <img src="https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2Fhtr-tech%2Fzphisher&title=Visitors&edge_flat=false"/>
</p>

<p align="center">
<b>A beginner-friendly automated phishing simulation toolkit with 30+ templates designed for cybersecurity learning and research.</b>
</p>

##

<h3><p align="center">Disclaimer</p></h3>

<i>
All activities and usage of <b>Zphisher</b> are solely the responsibility of the user. Misuse of this toolkit may result in <b>legal consequences or criminal charges</b> depending on your country's laws. The developers and contributors of this project <b>cannot be held responsible</b> for any misuse, damages, or illegal activities performed using this software.

This project contains materials that demonstrate how phishing techniques work in real-world scenarios. Such knowledge should only be used for <b>educational purposes, cybersecurity awareness, and authorized security testing</b>.

Before using this tool, ensure that you understand and comply with the <b>laws and regulations</b> of your country or region.

<b>This project is intended strictly for educational and research purposes.</b> Do not use this tool to perform unauthorized access attempts, credential harvesting, or any malicious activity.

The purpose of this project is to help learners understand <b>how phishing attacks work and how they can be prevented</b>. Any misuse of this information is strongly discouraged.
</i>

##

### Features

- Updated and realistic login page templates
- Beginner-friendly interface
- 30+ phishing simulation templates
- Multiple tunneling options:
  - Localhost
  - Cloudflared
  - LocalXpose
- Masked URL support
- Docker support
- Automatic dependency installation

##

### Installation

Clone this repository:

```
git clone --depth=1 https://github.com/htr-tech/zphisher.git
```

Navigate to the project directory and run the script:

```
$ cd zphisher
$ bash zphisher.sh
```

On the first launch, required dependencies will be installed automatically. After that, **Zphisher** will be ready to use.

##

### Installation (Termux)

You can easily install **Zphisher** in Termux using the `tur-repo` repository.

```
$ pkg install tur-repo
$ pkg install zphisher
$ zphisher
```

### Note

***Termux discourages discussions related to hacking tools***. Please avoid discussing tools like *Zphisher* in official Termux discussion groups.

For more information, see:  
https://wiki.termux.com/wiki/Hacking

##

<p align="left">
  <a href="https://shell.cloud.google.com/cloudshell/open?cloudshell_git_repo=https://github.com/htr-tech/zphisher.git&tutorial=README.md" target="_blank">
  <img src="https://gstatic.com/cloudssh/images/open-btn.svg"></a>
</p>

##

### Installation via ".deb" file

Download the `.deb` package from the **Latest Release** page:

https://github.com/htr-tech/zphisher/releases/latest

If you are using **Termux**, download the file ending with:

```
*_termux.deb
```

Install the package using:

```
apt install <path-to-deb-file>
```

Or:

```
$ dpkg -i <path-to-deb-file>
$ apt install -f
```

##

### Run on Docker

#### Docker Image Mirrors

**DockerHub**

```
docker pull htrtech/zphisher
```

**GitHub Container Registry**

```
docker pull ghcr.io/htr-tech/zphisher:latest
```

#### Run using wrapper script

```
$ curl -LO https://raw.githubusercontent.com/htr-tech/zphisher/master/run-docker.sh
$ bash run-docker.sh
```

#### Temporary container

```
docker run --rm -ti htrtech/zphisher
```

Remember to mount the `auth` directory if required.

##

<details>
  <summary><h3>Dependencies</h3></summary>

<b>Zphisher</b> requires the following programs to run properly:

- `git`
- `curl`
- `php`

> All required dependencies will be installed automatically during the first execution of **Zphisher**.
</details>

<details>
  <summary><h3>Tested on</h3></summary>

- **Ubuntu**
- **Debian**
- **Arch Linux**
- **Manjaro**
- **Fedora**
- **Termux**

</details>

##

<h3 align="center"><i>:: Workflow ::</i></h3>

<p align="center">
<img src=".github/misc/workflow.gif"/>
</p>

##

### Find Me On

<p align="left">
  <a href="https://tahmidrayat.is-a.dev" target="_blank">
  <img src="https://img.shields.io/badge/Socials-grey?style=for-the-badge&logo=linktree"></a>

  <a href="https://github.com/htr-tech" target="_blank">
  <img src="https://img.shields.io/badge/Github-blue?style=for-the-badge&logo=github"></a>
</p>

### *Thanks to all contributors*

<table>
  <tr align="center">
    <td><a href="https://github.com/1RaY-1"><img src="https://avatars.githubusercontent.com/u/78962948?s=100"/><br><sub><b>1RaY-1</b></sub></a></td>
    <td><a href="https://github.com/adi1090x"><img src="https://avatars.githubusercontent.com/u/26059688?s=100"/><br><sub><b>Aditya Shakya</b></sub></a></td>
    <td><a href="https://github.com/AliMilani"><img src="https://avatars.githubusercontent.com/u/59066012?s=100"/><br><sub><b>Ali Milani</b></sub></a></td>
    <td><a href="https://github.com/Meht-evaS"><img src="https://avatars.githubusercontent.com/u/57435273?s=100"/><br><sub><b>AmnesiA</b></sub></a></td>
    <td><a href="https://github.com/KasRoudra"><img src="https://avatars.githubusercontent.com/u/78908440?s=100"/><br><sub><b>KasRoudra</b></sub></a></td>
    <td><a href="https://github.com/MoisesTapia"><img src="https://avatars.githubusercontent.com/u/28166400?s=100"/><br><sub><b>Moises Tapia</b></sub></a></td>
  </tr>
  <tr align="center">
    <td><a href="https://github.com/E343IO"><img src="https://avatars.githubusercontent.com/u/74646789?s=100"/><br><sub><b>Mr.Derek</b></sub></a></td>
    <td><a href="https://github.com/BDhackers009"><img src="https://avatars.githubusercontent.com/u/67186139?s=100"/><br><sub><b>Mustakim Ahmed</b></sub></a></td>
    <td><a href="https://github.com/sepp0"><img src="https://avatars.githubusercontent.com/u/36642137?s=100"/><br><sub><b>sepp0</b></sub></a></td>
    <td><a href="https://github.com/TripleHat"><img src="https://avatars.githubusercontent.com/u/68332137?s=100"/><br><sub><b>TripleHat</b></sub></a></td>
    <td><a href="https://github.com/Yisus7u7"><img src="https://avatars.githubusercontent.com/u/64093255?s=100"/><br><sub><b>Yisus7u7</b></sub></a></td>
  </tr>
<table>

<!-- // -->
