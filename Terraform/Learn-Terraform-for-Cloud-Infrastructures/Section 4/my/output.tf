
output "my_bucket_out" {
  value = aws_s3_bucket.my_bucket
}

output "my_bucket_policy_out" {
  value = aws_s3_bucket_policy.my_bucket_policy
}

output "my_bucket_readme_file_out" {
  value = aws_s3_bucket_object.readme_file
}
