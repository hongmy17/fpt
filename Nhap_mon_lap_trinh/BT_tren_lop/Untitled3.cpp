#include <stdio.h>
#include <string.h>

int main() {
	char str1[] = "Learning a C is awesome";
	char str2[] = "C";
	int diem = 0;
	if (strstr(str1, str2) != NULL)
		printf("Tim thay\n");
		
	for (int i = 0; i < strlen(str1); i++) {
		if (str1[i] == str2[0]) {
			diem = 0;	
		}
	}
	return 0;
}
