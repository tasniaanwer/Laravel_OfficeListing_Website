# Vercel Deployment Instructions

## Prerequisites
- Vercel account (free)
- GitHub account with your repository

## Step 1: Install Vercel CLI
```bash
npm i -g vercel
```

## Step 2: Login to Vercel
```bash
vercel login
```

## Step 3: Deploy to Vercel
From your project directory, run:
```bash
vercel --prod
```

## Step 4: Configure Environment Variables
After the first deployment, set up environment variables in Vercel dashboard:
1. Go to your Vercel project dashboard
2. Click on "Settings" → "Environment Variables"
3. Add these variables:
   - `APP_NAME`: `Internship_Office_Portal`
   - `APP_KEY`: `base64:RyYhfvuW4ylmUYvIYzAF7nKPTcaD9X3gfqP/GADH2bI=`
   - `APP_ENV`: `production`
   - `APP_DEBUG`: `false`
   - `APP_URL`: `https://your-actual-url.vercel.app`
   - `DB_CONNECTION`: `sqlite`
   - `DB_DATABASE`: `/tmp/database.sqlite`

## Step 5: Redeploy
After setting environment variables, redeploy:
```bash
vercel --prod
```

## Alternative: GitHub Integration
1. Connect your GitHub repository to Vercel
2. Vercel will automatically deploy when you push to main branch
3. Configure environment variables in Vercel dashboard

## Files Created for Deployment
- `vercel.json` - Vercel configuration
- `vercel-build.sh` - Build script for production
- `.env.production` - Production environment variables
- `api/index.php` - Entry point for serverless functions

## Notes
- SQLite database will be created in `/tmp/` (Vercel's temporary storage)
- Data will persist between deployments but may be reset occasionally
- For production use, consider using Vercel Postgres or other external database
- Static assets are served from `public/` directory

## Troubleshooting
- If you get 500 errors, check Vercel function logs
- Ensure `APP_KEY` is set correctly
- Verify build script runs successfully
- Check that all required PHP extensions are available