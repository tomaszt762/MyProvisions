resource "aws_s3_bucket" "mybucket" {
    bucket = "mybucket-w989804109"
    acl = "private"
    tags = {
        Name  = "mybucket-w989804109"
        }     
}
