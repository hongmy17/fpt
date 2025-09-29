#include <stdio.h>
#include <string.h>

int main() {
	char str1[20], str2[20];
	printf("Nhap chuoi 1: ");
	gets(str1);
	printf("Nhap chuoi 2: ");
	gets(str2);
	
	if (strcmp(str1, str2) == 0) {
		printf("2 chuoi bang nhau.");
	} else if (strcmp(str1, str2) > 0) {
		printf("Chuoi 1 lon hon chuoi 2");
	} else {
		printf("Chuoi 2 lon hon chuoi 1");
	}
	return 0;
}
