import hashlib

import string


def crackMd5(dst):
    dst = dst.lower()
    time = 0
    for a in range(0,16):

        for b in range(0,16):

            for c in range(0,16):

                for d in range(0,16):
                    for e in range(0,16):
                        for f in range(0,16):
                            word = str(a) + str(b) + str(c) + str(d) + str(e) + str(f)

                            tmp = hashlib.md5(word).hexdigest()
                            time += 1
                            # if(time%10000==0):
                            #     print(time)
                            if dst == tmp[:5]:
                                print(tmp[:5])
                                return word

    return None


if __name__ == "__main__":
    print(crackMd5("eb619"))