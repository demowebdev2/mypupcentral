-- SQL Script to Delete "Mini Irish Doodle" Breed and Associated Posts
-- This script will:
-- 1. Find the breed ID for "Mini Irish Doodle"
-- 2. Delete all associated puppy posts, pictures, videos, and bookings
-- 3. Mark the breed as deleted (is_puppyverify = 0)

-- Step 1: Find the breed ID (for reference)
SELECT id, breed_name FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%';

-- Step 2: Delete booking time slots for all posts with this breed
-- (Replace XXX with the actual breed ID from Step 1)
DELETE FROM book_time_slot 
WHERE ad_id IN (SELECT id FROM posts WHERE category_id = (SELECT id FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%'));

-- Step 3: Delete post pictures
DELETE FROM posts_pictures 
WHERE post_id IN (SELECT id FROM posts WHERE category_id = (SELECT id FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%'));

-- Step 4: Delete post videos
DELETE FROM posts_videos 
WHERE post_id IN (SELECT id FROM posts WHERE category_id = (SELECT id FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%'));

-- Step 5: Delete all posts with this breed
DELETE FROM posts 
WHERE category_id = (SELECT id FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%');

-- Step 6: Mark breed as deleted
UPDATE breeds 
SET is_puppyverify = 0 
WHERE breed_name LIKE '%Mini Irish Doodle%';

-- Verification: Check if there are any remaining posts
SELECT COUNT(*) as remaining_posts FROM posts WHERE category_id = (SELECT id FROM breeds WHERE breed_name LIKE '%Mini Irish Doodle%');

