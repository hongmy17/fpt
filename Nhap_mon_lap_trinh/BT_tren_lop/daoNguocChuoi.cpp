#include <stdio.h>
#include <string.h>

int main() {
	char str[20];
	printf("Nhap chuoi: ");
	gets(str);

	printf("Chuoi vua nhap la: %s\n", str);
//	printf("Chuoi dao nguoc la: %s", strrev(str));

//	for (int i = strlen(str); i >= 0; i--) {
//		printf("%c", str[i]);
//	}	

	for (int i = 0; i < strlen(str); i++) {
		if (str[i] >= 65 && str[i] <= 90) {
			printf("%c", str[i] += 32);
		} else {
			printf("%c", str[i]);
		}
	}	
	
	for (int i = 0; i < strlen(str); i++) {
		if (str[i] >= 97 && str[i] <= 122) {
			printf("%c", str[i] -= 32);
		} else {
			printf("%c", str[i]);
		}
	}
	return 0;
}
