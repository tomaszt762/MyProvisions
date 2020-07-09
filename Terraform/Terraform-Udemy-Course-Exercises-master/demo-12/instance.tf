resource "aws_instance" "example" {
    ami = var.AMIS[var.AWS_REGION]
    instance_type = "t2.micro"
    subnet_id = aws_subnet.main-public-1.id
    vpc_security_group_ids = [aws_security_group.allow-ssh.id]
    key_name = aws_key_pair.mykeypair.key_name
    
   provisioner "file" {
    source      = "script.sh"
    destination = "/tmp/script.sh"
  }

  provisioner "remote-exec" {
    inline = [
      "chmod +x /tmp/script.sh",
      "sudo /tmp/script.sh",
    ]
  }

  connection {
    host        = self.public_ip
    type        = "ssh"
    user        = var.INSTANCE_USERNAME
    private_key = file(var.PATH_TO_PRIVATE_KEY)
  }
}

output "IntanceIp" {
    value = aws_instance.example.public_dns
}
