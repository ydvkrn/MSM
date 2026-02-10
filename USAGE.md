# Zphisher Usage Guide

This guide provides step-by-step instructions on how to use Zphisher, including understanding the hosting options and how to view/share generated links.

## Table of Contents
- [Quick Start](#quick-start)
- [Understanding Hosting Options](#understanding-hosting-options)
- [Step-by-Step Workflow](#step-by-step-workflow)
- [How to View and Share Links](#how-to-view-and-share-links)
- [Monitoring Captured Credentials](#monitoring-captured-credentials)
- [Stopping the Tool](#stopping-the-tool)
- [Tips and Best Practices](#tips-and-best-practices)

## Quick Start

After installation (see [DEPLOYMENT.md](DEPLOYMENT.md)), start Zphisher:

```bash
cd zphisher
bash zphisher.sh
```

The tool will:
1. Display a banner with the Zphisher logo
2. Show a menu of 35+ phishing templates
3. Allow you to select a template
4. Offer hosting/tunneling options
5. Generate a link you can use

## Understanding Hosting Options

Zphisher provides **three hosting options** to make your phishing page accessible. Each has different use cases:

### 1. Localhost (Option 01)

**What it is:** Runs the phishing page on your local machine only.

**When to use:**
- Testing the phishing page locally
- Your target is on the same network (LAN)
- You want to see how the page looks before deploying

**How it works:**
- Creates a local PHP server on `127.0.0.1:8080`
- Only accessible from your computer or local network
- No internet exposure

**Link format:** `http://127.0.0.1:8080` or `http://192.168.x.x:8080` (your local IP)

**Pros:**
- ✅ Fast and simple
- ✅ No external dependencies
- ✅ Good for testing

**Cons:**
- ❌ Not accessible from the internet
- ❌ Limited to local network

### 2. Cloudflared (Option 02)

**What it is:** Uses Cloudflare's tunneling service to create a public URL.

**When to use:**
- You need internet-accessible links
- You want a reliable, fast tunnel
- You need to reach targets outside your network

**How it works:**
- Automatically downloads and runs Cloudflared
- Creates a secure tunnel from your local server to the internet
- Provides a `*.trycloudflare.com` URL
- Auto-detects your system architecture

**Link format:** `https://random-words-1234.trycloudflare.com`

**Pros:**
- ✅ Accessible from anywhere on the internet
- ✅ HTTPS enabled (looks more legitimate)
- ✅ No account required
- ✅ No time limit
- ✅ Free to use

**Cons:**
- ❌ Random subdomain (changes each time)
- ❌ Requires internet connection

### 3. LocalXpose (Option 03)

**What it is:** Another tunneling service with custom features.

**When to use:**
- You want more control over your tunnel
- You have a LocalXpose account
- You need specific regional servers

**How it works:**
- Requires a free account at [localxpose.io](https://localxpose.io)
- You need to provide your access token
- Creates a tunnel with your chosen region
- Free tier may have time limits (check LocalXpose website for current limitations)

**Link format:** `https://yourusername.loclx.io`

**Pros:**
- ✅ Custom subdomain (with account)
- ✅ Regional server selection
- ✅ HTTPS enabled

**Cons:**
- ❌ Requires account and token
- ❌ Time-limited sessions on free tier
- ❌ May need to be restarted after timeout

## Step-by-Step Workflow

Here's a complete workflow from start to finish:

### Step 1: Launch Zphisher

```bash
bash zphisher.sh
```

### Step 2: Select a Phishing Template

You'll see a menu like this:

```
[01] Instagram    [13] Adobe ID     [25] Yahoo
[02] Facebook     [14] Deviantart   [26] Wordpress
[03] Snapchat     [15] Ebay         [27] Yandex
[04] Twitter      [16] Quora        [28] StackOverflow
[05] Github       [17] ProtonMail   [29] VK
[06] Google       [18] Spotify      [30] Xbox
...
```

Enter the number corresponding to your desired template (e.g., `01` for Instagram).

### Step 3: Choose a Hosting Option

After selecting a template, you'll see:

```
[01] Localhost
[02] Cloudflared  [Auto Detects]
[03] LocalXpose   [Time Limited]

Select a port forwarding service:
```

**Recommendations:**
- Choose `01` (Localhost) for testing
- Choose `02` (Cloudflared) for internet access (most popular)
- Choose `03` (LocalXpose) if you need advanced features

### Step 4: Get Your Link

After selecting a hosting option:

**For Localhost:**
```
[✓] Successfully Hosted at : http://127.0.0.1:8080
```

**For Cloudflared:**
```
[✓] Successfully Hosted at : https://random-words-1234.trycloudflare.com
```

**For LocalXpose:**
- First, you'll be prompted to enter your access token
- Then you'll get: `[✓] Successfully Hosted at : https://yourusername.loclx.io`

### Step 5: Share the Link

⚠️ **IMPORTANT:** Only share links for authorized security testing or educational purposes with proper written permission.

Copy the generated link and share it with your target through:
- Social media messages
- Email
- SMS
- QR code
- URL shortener (for cleaner appearance)

### Step 6: Monitor for Credentials

When someone visits your link and enters credentials, they will be automatically saved in the `auth/` directory.

## How to View and Share Links

### Viewing Your Hosted Page

1. **Copy the URL** displayed after successful hosting
2. **Open in a browser** to verify the page loads correctly
3. **Test the form** by entering dummy credentials to ensure it's working

### Sharing Methods

⚠️ **AUTHORIZATION REQUIRED:** Only use these methods for authorized security testing with written permission. Unauthorized use is illegal and unethical.

1. **Direct Link Sharing:**
   - Copy and paste the URL directly
   - Works for any messaging platform

2. **URL Masking (Advanced):**
   - Use URL shorteners like bit.ly, tinyurl.com
   - Creates a cleaner, more trustworthy-looking link
   - Example: `https://bit.ly/3xYZ123` instead of `https://random-words.trycloudflare.com`

3. **QR Code:**
   - Generate a QR code from your URL using online tools
   - Share the QR code image
   - Useful for physical distribution

4. **Social Engineering Context (For Authorized Testing Only):**
   - Only use in authorized penetration testing scenarios
   - Always provide context when sharing (e.g., "Check out this offer", "Verify your account")
   - Make it relevant to your target
   - Time it appropriately
   - Document the testing scenario and obtain proper authorization

### URL Masking Example

The tool provides suggested mask URLs for each template. You'll see them in the format:

```
[✓] URL 1 : https://random-words-1234.trycloudflare.com
[✓] URL 2 : https://instagram-verify-account@random-words-1234.trycloudflare.com
```

URL 2 is a "masked" version that looks more legitimate in notifications and previews.

## Monitoring Captured Credentials

### Real-Time Monitoring

While Zphisher is running, it automatically monitors for credentials. When someone submits the form:

```
[✓] Victim's IP : xxx.xxx.xxx.xxx
[✓] Username : victim@email.com
[✓] Password : ********
[✓] Saved : auth/usernames.dat
```

### Viewing Saved Data

All captured data is stored in the `auth/` directory:

```bash
# View captured credentials
cat auth/usernames.dat

# View captured IPs
cat auth/ip.txt
```

### Log Files

The tool creates log files in the `.server/` directory:
- `.server/.loclx` - LocalXpose logs
- `.server/.cld.log` - Cloudflared logs
- `.server/php.log` - PHP server logs

## Stopping the Tool

To properly stop Zphisher:

1. **Press `Ctrl+C`** in the terminal where Zphisher is running
2. The tool will automatically clean up:
   - Stop the PHP server
   - Stop the tunneling service
   - Remove temporary files

3. **Verify processes are stopped:**
   ```bash
   # Check if PHP is still running
   ps aux | grep php
   
   # Check if Cloudflared is still running
   ps aux | grep cloudflared
   
   # If any are still running, stop them manually
   killall php
   killall cloudflared
   ```

## Tips and Best Practices

### Testing First

Always test your phishing page before deploying:

1. Use **Localhost** option first
2. Open `http://127.0.0.1:8080` in your browser
3. Enter test credentials to verify they're captured
4. Check `auth/usernames.dat` to confirm data is saved
5. Once verified, switch to Cloudflared or LocalXpose for deployment

### Choosing the Right Template

- Research your target to understand which platform they use
- Choose templates that match your social engineering scenario
- Popular templates: Instagram, Facebook, Google, GitHub

### Security and Privacy

- **Only use for authorized testing**: Get written permission before testing
- **Secure your captured data**: The `auth/` directory contains sensitive information
- **Clean up after testing**: Delete captured credentials when done
- **Use a VPN**: Protect your identity when hosting phishing pages

### Troubleshooting

**Link not accessible:**
- Ensure you selected option 02 (Cloudflared) or 03 (LocalXpose), not Localhost
- Check your internet connection
- Try regenerating the link

**Credentials not saving:**
- Check permissions on the `auth/` directory: `chmod 700 auth`
- Verify the `auth/` directory exists: `mkdir -p auth`
- Look for errors in the terminal output

**Cloudflared not working:**
- The tool auto-downloads Cloudflared on first use
- Check `.server/cloudflared` exists and is executable
- Try running `bash zphisher.sh` again

**LocalXpose timeout:**
- Free tier may have time-limited sessions (check LocalXpose documentation)
- Restart Zphisher to get a new session if it times out
- Consider upgrading your LocalXpose account for longer or unlimited sessions

### Advanced Usage

**Custom Port:**
Edit `zphisher.sh` and change:
```bash
PORT='8080'  # Change to your desired port
```

**Custom Host:**
```bash
HOST='127.0.0.1'  # Change if needed
```

**Persistent Sessions:**
For Docker users, mount the auth directory:
```bash
docker run --rm -ti --network="host" \
  -v $(pwd)/auth:/zphisher/auth \
  htrtech/zphisher
```

## Additional Resources

- **Main Repository:** https://github.com/htr-tech/zphisher
- **Deployment Guide:** [DEPLOYMENT.md](DEPLOYMENT.md)
- **Issues & Support:** https://github.com/htr-tech/zphisher/issues
- **Video Tutorials:** Search "Zphisher tutorial" on YouTube

## Disclaimer

**⚠️ IMPORTANT:** This tool is for **educational and authorized security testing purposes only**.

- Always obtain **written permission** before testing
- **Never use** on systems you don't own or have permission to test
- Misuse can result in **criminal charges**
- The contributors are **not responsible** for misuse
- Follow **all applicable laws and regulations**

Use responsibly and ethically. Happy (ethical) hacking! 🎯
